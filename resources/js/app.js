import './bootstrap';
import './sidebar';
import 'preline'

import Alpine from 'alpinejs';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

window.Alpine = Alpine

Alpine.start()

gsap.registerPlugin(ScrollTrigger);

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

// Ekspor agar bisa dipanggil dari Blade
window.initScrollAnimations = initScrollAnimations;
window.cardScrollAnimations = cardScrollAnimations;