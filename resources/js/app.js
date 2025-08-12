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



// function initScrollAnimations() {
//   // Animasi teks heading `.c`
//   gsap.to(".c", {
//     scrollTrigger: {
//       trigger: ".c",
//       start: "center 40%",
//       toggleActions: "restart pause reverse pause",
//       scrub: true,
//       // markers: true, // aktifkan jika ingin debugging
//     },
//     opacity: 0,
//     x: 500,
//     duration: 5
//   });

//   // Animasi paragraf `.d`
//   gsap.to(".d", {
//     scrollTrigger: {
//       trigger: ".c",
//       start: "center 40%",
//       toggleActions: "restart pause reverse pause",
//       scrub: true,
//       // markers: true,
//     },
//     opacity: 0,
//     x: -500,
//     duration: 5
//   });

// }

function initScrollAnimations() {
  // Heading animasi
  gsap.to(".c", {
    scrollTrigger: {
      trigger: ".c",
      start: "center 40%",
      toggleActions: "restart pause reverse pause",
      scrub: true,
    },
    opacity: 0,
    xPercent: 10,
    duration: 2
  });

  // Paragraf animasi
  gsap.to(".d", {
    scrollTrigger: {
      trigger: ".c",
      start: "center 40%",
      toggleActions: "restart pause reverse pause",
      scrub: true,
    },
    opacity: 0,
    xPercent: -10,
    duration: 2
  });
}


function cardScrollAnimations() {
// Ambil semua kartu
  const cards = document.querySelectorAll(".card");

  // Timeline utama untuk animasi muncul dengan stagger
  const tlMain = gsap.timeline({
    scrollTrigger: {
      trigger: ".card1", // wrapper container semua card
      start: "top 90%",
      toggleActions: "play none none reset",
      markers: false
    }
  });

  // Jalankan animasi garis untuk setiap kartu secara individual
  cards.forEach((card) => {
    const line = card.querySelector(".line");
    if (line) {
      gsap.set(line, { visibility: "visible" });
      gsap.fromTo(line,
        { width: "0%" },
        {
          width: "100%",
          duration: 0.4,
          ease: "power1.inOut",
          scrollTrigger: {
            trigger: card,
            start: "top 85%",
            toggleActions: "play none none reset"
          }
        }
      );
    }
  });

  // Tambahkan animasi muncul ke atas dengan stagger
  tlMain.from(cards, {
    y: 60,
    opacity: 0,
    duration: 0.8,
    ease: "power2.out",
    stagger: 0.2, // jeda antar card
    clearProps: "transform,opacity",
    scale: 0.95
  }, "-=0.4"); // mulai setelah animasi garis dimulai

}

// Navbar scroll effect
function animateNavbar(show) {
  const nav = document.querySelector("nav");
  if (!nav) return;

  if (show) {
    nav.classList.remove("nav-transparent");
    nav.classList.add("nav-glass");
  } else {
    nav.classList.remove("nav-glass");
    nav.classList.add("nav-transparent");
  }  

  // nav.classList.toggle("nav-glass", show);
  // nav.classList.toggle("nav-transparent", !show);
}

function navbarScrollEffect() {
  ScrollTrigger.create({
    trigger: "body",
    start: "bottom 80%",
    onEnter: () => animateNavbar(true),
    onLeaveBack: () => animateNavbar(false),
  });
}

document.addEventListener("DOMContentLoaded", () => {
  navbarScrollEffect();
});

  function fadeInOnScroll() {
  const elements = document.querySelectorAll('.fade-section');

  elements.forEach(section => {
    const items = section.querySelectorAll('.fade-item');

    gsap.from(items, {
      scrollTrigger: {
        trigger: section,
        start: 'bottom 100%',
        toggleActions: 'restart none none reverse',
      },
      yPercent: 100,       // masuk dari bawah
      opacity: 0,
      duration: 1.5,
      ease: 'power3.out',
    });
  });
}

  function setupScrollTrigger2() {
    // Set initial state
    gsap.set(".letter-s, .letter-o, .letter-n, .letter-a, .letter-r", {
      opacity: 0,
    });

    // Buat timeline scroll-triggered
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: "#logo-sonar",
        start: "top 90%",
        toggleActions: "restart none none reset"
      }
    });

    // Tambahkan animasi per huruf ke timeline
    tl.to(".letter-s", { opacity: 1, y: 0, duration: 0.5 })
      .to(".letter-o", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-n", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-a", { opacity: 1, y: 0, duration: 0.5 }, ">")
      .to(".letter-r", { opacity: 1, y: 0, duration: 0.5 }, ">");
  }

  // Panggil fungsinya saat halaman siap
  // setupScrollTrigger2();

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


// Ekspor agar bisa dipanggil dari Blade
window.initScrollAnimations = initScrollAnimations;
window.cardScrollAnimations = cardScrollAnimations;
window.fadeInOnScroll = fadeInOnScroll;
window.setupScrollTrigger2 = setupScrollTrigger2;
window.textBlur = textBlur;