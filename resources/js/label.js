import './bootstrap';
import './sidebar';
import 'preline'

import Alpine from 'alpinejs';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from 'gsap/all';
// import { SplitType } from 'gsap/all';


window.Alpine = Alpine

gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(SplitText); 
// gsap.registerPlugin(SplitType);    



    
window.onload = () => {
    transition();
    window.Alpine = Alpine;
    Alpine.start();
    // transition();
    // textBlur();
    // parallaxScroll();
    // animateSubmit();
    // animateTeks();
    ScrollTrigger.refresh();

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

function transition() {
    const transisi = document.getElementById("transisi-enter");
    const section = document.getElementById("second-section");
    const video = transisi.querySelector("video");
    const body = document.getElementById("body");
    const video2 = document.querySelector(".scroll-video");

    // Tunggu sampai video selesai
    video.addEventListener("ended", () => {
        transisi.classList.add("fade-out");
        section.classList.remove("hidden");
        // body.classList.remove("overflow-hidden")
        // Lepas scroll setelah animasi fade selesai
        setTimeout(() => {
            transisi.style.display = "none";
            document.body.style.overflow = "auto";
            if (video2 && video2.offsetParent !== null){
              scrollVideo();
            }
            textBlur();
            parallaxScroll();
            animateSubmit();
            animateTeks();
            ScrollTrigger.refresh();

        },1500); // durasi animasi fade-out CSS
    });
}

// function scrollVideo() {
//   const video = document.querySelector(".scroll-video");

//   if(video != null) {
//   let src = video.currentSrc || video.src;

//       gsap.registerPlugin(ScrollTrigger);

//   function once(el, event, fn, opts) {
//     var onceFn = function () {
//       el.removeEventListener(event, onceFn);
//       fn.apply(this, arguments);
//     };
//     el.addEventListener(event, onceFn, opts);
//   }

//   once(document.documentElement, "touchstart", function () {
//     video.play();
//     video.pause();
//   });

//   once(video, "loadedmetadata", () => {
  
//     video.addEventListener("loadedmetadata", () => {
//       const duration = video.duration;

//       ScrollTrigger.create({
//         trigger: ".h-screen",
//         start: "top top",
//         end: "+=1300",
//         scrub: true,
//         pin: true,
//         onUpdate: (self) => {
//           // progress 0 → 1 dipetakan ke 0 → duration
//           video.currentTime = self.progress * duration;
//         }
//       });
//     });
//   });

//   // Optional: fetch video sebagai blob untuk mencegah drop frame
//   setTimeout(() => {
//     if (window.fetch) {
//       fetch(src)
//         .then((res) => res.blob())
//         .then((blob) => {
//           let blobURL = URL.createObjectURL(blob);
//           let t = video.currentTime;
//           once(document.documentElement, "touchstart", function () {
//             video.play();
//             video.pause();
//           });
//           video.setAttribute("src", blobURL);
//           video.currentTime = t + 0.01;
//         });
//     }
//   }, 1000);
//   }
// }

function scrollVideo() {
  const video = document.querySelector(".scroll-video");
  // console.log(video);
  // if(video.offsetParent===null){
  //   console.log(null);
  // }
  // console.log(!video || video.offsetParent);
  // if (!video || video.offsetParent === null) return; // keluar jika video tidak ada

  const src = video.currentSrc || video.src;

  gsap.registerPlugin(ScrollTrigger);

  // helper agar event hanya dijalankan sekali
  function once(el, event, fn, opts) {
    const onceFn = function () {
      el.removeEventListener(event, onceFn);
      fn.apply(this, arguments);
    };
    el.addEventListener(event, onceFn, opts);
  }

  // touchstart untuk autoplay di mobile
  once(document.documentElement, "touchstart", function () {
    video.play();
    video.pause();
  });

  // main scroll trigger
  once(video, "loadedmetadata", () => {
    const duration = video.duration;

    ScrollTrigger.create({
      trigger: ".h-screen",
      start: "top top",
      end: "+=1500",
      scrub: true,
      pin: true,
      onUpdate: (self) => {
        video.currentTime = self.progress * duration;
      }
    });
  });

  // Optional: fetch video sebagai blob untuk mencegah drop frame
  setTimeout(() => {
    if (window.fetch) {
      fetch(src)
        .then((res) => res.blob())
        .then((blob) => {
          const blobURL = URL.createObjectURL(blob);
          const t = video.currentTime;

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


function animateSubmit() {

    gsap.utils.toArray('.animate-submit').forEach(el => {
    let typeSplit = new SplitType(el, { types: 'lines, words, chars', tagName: 'span' });

    gsap.from(el.querySelectorAll('.word'), {
      y: '100%',
      opacity: 0,
      duration: 1,
      ease: 'power1.out',
      stagger: 0.25,
      scrollTrigger: {
        trigger: el,
        start: 'top 80%', // lebih tinggi supaya terlihat di layar kecil
        toggleActions: "play none none reverse",
      }
    });
  });
}


function animateTeks() {
  // Target semua elemen dengan class .animate-teks
  gsap.utils.toArray('.animate-teks').forEach(el => {
    let typeSplit = new SplitType(el, { types: 'lines, words, chars', tagName: 'span' });

    gsap.from(el.querySelectorAll('.word'), {
      opacity: 0.5, // supaya animasi lebih terlihat
      filter: "blur(5px)",
      duration: 1,
      ease: 'power1.out',
      stagger: 0.1,
      scrollTrigger: {
        trigger: el,       // trigger khusus per elemen teks
        start: 'top 85%',  // start lebih tinggi supaya terlihat di layar kecil
        toggleActions: "play none none none",
        scrub: false,
      }
    });
  });
}


// document.addEventListener("DOMContentLoaded", scrollVideo);


