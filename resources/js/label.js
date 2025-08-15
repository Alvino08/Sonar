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
