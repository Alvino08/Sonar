import './bootstrap';
import './sidebar';

import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger"; // ✅ PAKAI kapital S & T
gsap.registerPlugin(ScrollTrigger); // ✅

gsap.to(".c", {
    scrollTrigger: {
        trigger: ".c",
        start: "center 30%",
        // markers: true,
        toggleActions: "restart pause reverse pause",
        scrub: true,
    },
    x: 500,
    opacity: 0,
    duration: 5
});

gsap.to(".d", {
    scrollTrigger: {
        trigger: ".c",
        start: "center 100%",
        // markers: true,
        toggleActions: "restart pause reverse pause",
        scrub: true,
    },
    x: -1500,
    duration: 5
});

// document.querySelectorAll(".card").forEach((card, index) => {
//   gsap.from(card, {
//     scrollTrigger: {
//       trigger: ".card1",
//       start: "top 80%",
//       toggleActions: "restart reverse restart reverse",
//       markers: true
//     },
//     y: 80,                   // naik ke atas sejauh 80px
//     opacity: 0,              // mulai dari transparan
//     duration: 0.5,           // durasi tetap
//     delay: index * 0.3,      // jeda antar card
//     ease: "none",             // TANPA easing (kecepatan konstan)
//   });
// });

// Ambil semua kartu
const cards = document.querySelectorAll(".card");

// Timeline utama untuk animasi muncul dengan stagger
const tlMain = gsap.timeline({
  scrollTrigger: {
    trigger: ".card1", // wrapper container semua card
    start: "top 85%",
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
          start: "top 95%",
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
  clearProps: "transform,opacity"
}, "-=0.4"); // mulai setelah animasi garis dimulai






