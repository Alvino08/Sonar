import './bootstrap';
import './sidebar';
import 'preline'

import Alpine from 'alpinejs';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from 'gsap/all';

window.Alpine = Alpine

Alpine.start()

gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(SplitText);    


    
window.onload = () => {
    // transition();
    window.Alpine = Alpine
    Alpine.start()
    // transition();
    textBlur();
    parallaxScroll();
    scrollVideo();
}

function textBlur() {
// Split per kata

    document.fonts.ready.then(() => {
        gsap.set(".container", { opacity: 1 });

        // Split per kata
        let split = new SplitText(".animate-me", { type: "words", aria: "hidden" });

        gsap.from(split.words, {
            opacity: 0,
            filter: "blur(15px)",
            duration: 1,
            ease: "sine.out",
            stagger: 0.1,
            scrollTrigger: {
            trigger: ".animate-me",
            start: "top 80%",
            toggleActions: "play none none none"
                }
        });
    });
}

function parallaxScroll(){
    gsap.utils.toArray('[data-speed]').forEach(el => {
        const speed = parseFloat(el.getAttribute('data-speed')) || 1;

        // movement = seberapa banyak px elemen akan berpindah (tweak sesuai kebutuhan)
        const movement = (1 - speed) * (window.innerHeight * 0.6);

        gsap.to(el, {
            y: movement,
            ease: "none",
            scrollTrigger: {
                trigger: el,
                start: 'top 10%',   // mulai saat top elemen mencapai bottom viewport
                // end: 'bottom top',     // selesai saat bottom elemen mencapai top viewport
                scrub: true,
                invalidateOnRefresh: true
            }
        });
    });
}

function transition(){
    document.body.style.overflow = "hidden";

    const transisi = document.getElementById("transisi-enter");

    // Misalnya fade-out setelah 3 detik
    setTimeout(() => {
        transisi.classList.add("fade-out");

        // Lepas scroll setelah animasi fade selesai
        setTimeout(() => {
            transisi.style.display = "none";
            document.body.style.overflow = "auto";
        }, 1500); // 1.5s = sama dengan transition CSS
    }, 3000); // durasi tampil transisi sebelum memudar
}

function scrollVideo() {
  const video = document.querySelector(".scroll-video");
  let src = video.currentSrc || video.src;

  gsap.registerPlugin(ScrollTrigger);

  function once(el, event, fn, opts) {
    var onceFn = function () {
      el.removeEventListener(event, onceFn);
      fn.apply(this, arguments);
    };
    el.addEventListener(event, onceFn, opts);
  }

  once(document.documentElement, "touchstart", function () {
    video.play();
    video.pause();
  });

  once(video, "loadedmetadata", () => {
    gsap.to(video, {
      currentTime: video.duration,
      ease: "none",
      scrollTrigger: {
        trigger: ".h-screen",
        start: "top top",
        end: "+=2000", // jarak scroll dalam px
        scrub: true,
        pin: true, // section tetap di layar
      }
    });
  });

  // Optional: fetch video sebagai blob untuk mencegah drop frame
  setTimeout(() => {
    if (window.fetch) {
      fetch(src)
        .then((res) => res.blob())
        .then((blob) => {
          let blobURL = URL.createObjectURL(blob);
          let t = video.currentTime;
          once(document.documentElement, "touchstart", function () {
            video.play();
            video.pause();
          });
          video.setAttribute("src", blobURL);
          video.currentTime = t + 0.01;
        });
    }
  }, 1000);
}

document.addEventListener("DOMContentLoaded", scrollVideo);


