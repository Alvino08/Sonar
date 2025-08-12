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
            duration: 0.05,
            onComplete: () => {
            firstSection.style.display = "none";
            // Tampilkan second-section
            const secondSection = document.getElementById("second-section");
            secondSection.classList.remove("hidden");

            // Mulai ScrollTrigger setelah second-section aktif
            setupScrollTrigger();
            fadeInOnScroll('.fade-section');
            fadeInServiceItems("#container-4");
            parallaxScroll();
            // setupScrollTrigger2();
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
  const bgImage = document.getElementById("img-background");
  const texts = [ "#sonar", "#audio", "#post" ].map(id => document.querySelector(id));

  const splitTargets = [ "#sonar", "#audio", "#post" ];
  const splitLines = [];

  splitTargets.forEach(selector => {
    const el = document.querySelector(selector);
    if (el) {
      const split = new SplitText(el, { type: "lines", linesClass: "line" });
      splitLines.push(...split.lines);
    }
  });

  // gsap.from(splitLines, {
  //   duration: 1,
  //   yPercent: 100,
  //   opacity: 0,
  //   stagger: 0.15,
  //   onComplete: () => {
  //     gsap.fromTo(leftImg, { x: -150, opacity: 0 }, {
  //       x: 0, opacity: 1, duration: 1, ease: "power2.out",
  //       onComplete: () => {
  //         gsap.fromTo(rightImg, { x: 150, opacity: 0 }, {
  //           x: 0, opacity: 1, duration: 1, ease: "power2.out"
  //         });
  //       }
  //     });
  //   }
  // });

gsap.timeline()
  // Gambar zoom-out dan fade-in
  .fromTo(bgImage,
    { scale: 1.3, opacity: 1 },
    { scale: 1, opacity: 0.25, duration: 2, ease: "power3.inOut" }
  )

  // Teks zoom-in dan muncul bersamaan (dengan stagger)
  .fromTo(texts,
    { scale: 0.2, opacity: 0 },
    {
      scale: 1,
      opacity: 1,
      duration: 1.5,
      ease: "power1.inOut"
    },
    "-=2" // dimulai bersamaan (overlap 1.5 detik dari animasi gambar)
  );

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

  // function fadeInOnScroll(selector) {
  //   const elements = document.querySelectorAll(selector);

  //   elements.forEach(section => {
  //     const items = section.querySelectorAll('.fade-item');

  //     gsap.from(items, {
  //       scrollTrigger: {
  //         trigger: section,
  //         start: 'top 50%', // saat 80% viewport
  //         toggleActions: 'restart none none reset',
  //       },
  //       opacity: 0,
  //       y:50,
  //       duration: 1.2,
  //       // ease: 'power2.inOut',
  //       stagger: 0.2,
  //     });
  //   });
  // }

// function fadeInOnScroll(selector) {
//   const elements = document.querySelectorAll(selector);

//   elements.forEach(section => {
//     const items = section.querySelectorAll('.fade-item');

//     gsap.from(items, {
//       scrollTrigger: {
//         trigger: section,
//         start: 'top 30%',
//         toggleActions: 'play none none reverse',
//       },
//       yPercent: 50,
//       opacity: 0,
//       duration: 1.5,
//       ease: 'power3.out',
//       // onComplete: () => {
//       //   items.forEach(item => {
//       //     // ganti outline → solid dengan transisi CSS
//       //     item.classList.remove('anton-outline');
//       //     item.classList.add('anton-solid');
//       //   });
//       // }
//     });
//   });
// }

  function fadeInOnScroll(selector) {
    const sections = document.querySelectorAll(selector);
    sections.forEach(section => {
      const items = section.querySelectorAll('.fade-item');
      if (!items.length) return;

      gsap.from(items, {
        scrollTrigger: {
          trigger: section,
          start: 'top 70%',   // sesuaikan kalau mau muncul lebih awal/kemudian
          end: 'bottom 30%',
          toggleActions: 'restart none none reset',
          invalidateOnRefresh: true
        },
        yPercent: 100,
        // opacity: 0,
        duration: 3,
        ease: 'power3.out',
        stagger: 0.06,
        immediateRender: false // penting agar gsap.from tidak langsung men-set inline styles sebelum ScrollTrigger siap
      });
    });
  }


function fadeInServiceItems(selector) {
  const sections = document.querySelectorAll(selector);

  sections.forEach(section => {
    const items = section.querySelectorAll('.fade-item-service');

    items.forEach(item => {
      gsap.from(item, {
        scrollTrigger: {
          trigger: item,
          start: 'top 105%',
          toggleActions: 'restart none none reset',
        },
        scale: 0,
        y: 100,
        duration: 1,
        ease: 'power1.inOut'
      });
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