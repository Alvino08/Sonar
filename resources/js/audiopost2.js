import gsap from "gsap";
import Alpine from 'alpinejs';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from "gsap/SplitText";
import 'preline'

gsap.registerPlugin(ScrollTrigger);

window.onload = () => {
    window.Alpine = Alpine

    // const wrapper = document.getElementById("marquee-wrapper");
    // const content = document.getElementById("marquee-content");

    // if (wrapper && content) {
    // // Clone konten
    // const clone = content.cloneNode(true);
    // wrapper.appendChild(clone);

    // let x = 0;

    // function scrollMarquee() {
    //     x -= 1;

    //     content.style.transform = `translateX(${x}px)`;
    //     clone.style.transform = `translateX(${x + content.offsetWidth}px)`;

    //     // Reset jika scroll selesai 1 putaran
    //     requestAnimationFrame(scrollMarquee);
    // }

    // scrollMarquee();
    // }


    
    Alpine.start()
    document.body.classList.remove("invisible");

    const firstSection = document.getElementById("first-section");
    const img1 = document.getElementById("img-1");
    const img2 = document.getElementById("img-2");
    const img3 = document.getElementById("img-3");

    const tl = gsap.timeline();

  tl.fromTo(img2, { scale: 5, opacity: 0 }, { scale: 1, opacity: 1, duration: 1 })
    .fromTo(img1, { x: 150, opacity: 0 }, { x: 0, opacity: 1, duration: 1 }, 1.2)
    .fromTo(img3, { x: -150, opacity: 0 }, { x: 0, opacity: 1, duration: 1 }, 1.2)
    .to(img2, { opacity: 0.8, scale: 0.8, duration: 0.5 }, 2.7)
    .to(img2, { scale: 5, opacity: 0, duration: 0.5 }, ">")
    .to(img1, { x: -200, opacity: 0.5, duration: 0.5 }, 2.9)
    .to(img3, { x: 200, opacity: 0.5, duration: 0.5 }, 2.9)
    .to(img1, { x: 400, opacity: 0, duration: 0.5 }, "<")
    .to(img3, {
      x: -400,
      opacity: 0,
      duration: 0.5,
      onComplete: () => {
        // Sembunyikan first-section
        gsap.to(firstSection, {
            opacity: 0,
            duration: 0.5,
            onComplete: () => {
            firstSection.style.display = "none";
            // Tampilkan second-section
            const secondSection = document.getElementById("second-section");
            secondSection.classList.remove("hidden");

            // Mulai ScrollTrigger setelah second-section aktif
            setupScrollTrigger();
            }
        });
        }
    }, "<");    
    
};

function setupScrollTrigger() {
  gsap.set(".panel", {
    zIndex: (i, el, arr) => arr.length - i
  });

  gsap.to(".panel:not(:last-child)", {
    yPercent: -100,
    ease: "none",
    stagger: 0.5,
    scrollTrigger: {
      trigger: "#container",
      start: "top top",
      end: "+=200%",
      scrub: true,
      pin: true
    }
  });

  const leftImg = document.getElementById("left-img");
  const rightImg = document.getElementById("right-img");

  const splitTargets = [ "#sonar", "#audio", "#post" ];
  const splitLines = [];

  splitTargets.forEach(selector => {
    const el = document.querySelector(selector);
    if (el) {
      const split = new SplitText(el, { type: "lines", linesClass: "line" });
      splitLines.push(...split.lines);
    }
  });

  gsap.from(splitLines, {
    duration: 1,
    yPercent: 100,
    opacity: 0,
    stagger: 0.15,
    onComplete: () => {
      gsap.fromTo(leftImg, { x: -150, opacity: 0 }, {
        x: 0, opacity: 1, duration: 1, ease: "power2.out",
        onComplete: () => {
          gsap.fromTo(rightImg, { x: 150, opacity: 0 }, {
            x: 0, opacity: 1, duration: 1, ease: "power2.out"
          });
        }
      });
    }
  });

  const textIds = ["line1", "line2a", "line2b", "line3a", "line3b", "line4"];
  textIds.forEach((id, i) => {
    const el = document.getElementById(id);
    if (el) {
      gsap.from(el, {
        scrollTrigger: {
          trigger: el,
          start: "top 50%",
          toggleActions: "reset restart reverse reset"
        },
        opacity: 0,
        y: 50,
        duration: 1,
        delay: i * 0.1
      });
    }
  });
}