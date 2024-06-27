// gazou.js
document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.carousel-container').forEach((container, index) => {
            const lt = container.querySelector('.lt');
            const gt = container.querySelector('.gt');
            const carousel = container.querySelector('.carousel');
            const boxes = carousel.querySelectorAll('.box');
            let currentIndex = 0;

            function updateButtons() {
                lt.classList.remove('hidden');
                gt.classList.remove('hidden');

                if (currentIndex === 0) {
                    lt.classList.add('hidden');
                }

                if (currentIndex === boxes.length - 1) {
                    gt.classList.add('hidden');
                }
            }

            function moveCarousel() {
                const boxWidth = boxes[0].getBoundingClientRect().width;
                carousel.style.transform = `translateX(${-1 * boxWidth * currentIndex}px)`;
            }

            updateButtons();

            gt.addEventListener('click', () => {
                currentIndex++;
                updateButtons();
                moveCarousel();
            });

            lt.addEventListener('click', () => {
                currentIndex--;
                updateButtons();
                moveCarousel();
            });

            window.addEventListener('resize', () => {
                moveCarousel();
            });
        });
    });