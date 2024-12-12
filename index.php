<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventskalender</title>
    <style>
        /* Allgemeine Stile */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        .calendar-wrapper {
            position: relative;
            width: 800px;
            height: 600px;
            overflow: hidden;
            border: 5px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .calendar {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .door {
            position: absolute;
            width: calc(800px / 6 - 10px); /* Türchenbreite */
            height: calc(600px / 4 - 10px); /* Türchenhöhe */
            background-color: rgba(255, 255, 255, 0.2); /* Transparenz */
            border: 2px solid black;
            box-sizing: border-box;
            cursor: pointer;
            z-index: 2;
            transition: transform 0.3s ease, background-color 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        .door.open {
            transform: rotateY(0);
            background-color: rgba(255, 255, 255, 0.9); /* Weiß */
            border-color: white;
        }

        .door[data-number="1"] { top: 0; left: 0; }
        .door[data-number="2"] { top: 0; left: calc(800px / 6 * 1); }
        .door[data-number="3"] { top: 0; left: calc(800px / 6 * 2); }
        .door[data-number="4"] { top: 0; left: calc(800px / 6 * 3); }
        .door[data-number="5"] { top: 0; left: calc(800px / 6 * 4); }
        .door[data-number="6"] { top: 0; left: calc(800px / 6 * 5); }
        .door[data-number="7"] { top: calc(600px / 4 * 1); left: 0; }
        .door[data-number="8"] { top: calc(600px / 4 * 1); left: calc(800px / 6 * 1); }
        .door[data-number="9"] { top: calc(600px / 4 * 1); left: calc(800px / 6 * 2); }
        .door[data-number="10"] { top: calc(600px / 4 * 1); left: calc(800px / 6 * 3); }
        .door[data-number="11"] { top: calc(600px / 4 * 1); left: calc(800px / 6 * 4); }
        .door[data-number="12"] { top: calc(600px / 4 * 1); left: calc(800px / 6 * 5); }
        .door[data-number="13"] { top: calc(600px / 4 * 2); left: 0; }
        .door[data-number="14"] { top: calc(600px / 4 * 2); left: calc(800px / 6 * 1); }
        .door[data-number="15"] { top: calc(600px / 4 * 2); left: calc(800px / 6 * 2); }
        .door[data-number="16"] { top: calc(600px / 4 * 2); left: calc(800px / 6 * 3); }
        .door[data-number="17"] { top: calc(600px / 4 * 2); left: calc(800px / 6 * 4); }
        .door[data-number="18"] { top: calc(600px / 4 * 2); left: calc(800px / 6 * 5); }
        .door[data-number="19"] { top: calc(600px / 4 * 3); left: 0; }
        .door[data-number="20"] { top: calc(600px / 4 * 3); left: calc(800px / 6 * 1); }
        .door[data-number="21"] { top: calc(600px / 4 * 3); left: calc(800px / 6 * 2); }
        .door[data-number="22"] { top: calc(600px / 4 * 3); left: calc(800px / 6 * 3); }
        .door[data-number="23"] { top: calc(600px / 4 * 3); left: calc(800px / 6 * 4); }
        .door[data-number="24"] { top: calc(600px / 4 * 3); left: calc(800px / 6 * 5); }

        /* Modal-Stile */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 3;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: auto;
            max-height: 100%;
        }

        .modal img, .modal iframe {
            width: auto;
            height: 100%;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="calendar-wrapper">
        <div class="calendar">
            <img src="images/kalender.jpg" alt="Adventskalender" class="background-image">
            <?php for ($i = 1; $i <= 24; $i++): ?>
                <div class="door" data-number="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="modal" id="modal">
        <span class="close" id="closeModal">&times;</span>
        <div class="modal-content" id="modalContent"></div>
    </div>

    <script>
        const doors = document.querySelectorAll('.door');
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        const closeModal = document.getElementById('closeModal');

        doors.forEach(door => {
            door.addEventListener('click', () => {
                const number = door.dataset.number;
                door.classList.add('open');
                let content;
                if (number === '2') {
                    content = '<iframe width="560" height="315" src="https://www.youtube.com/embed/0aZCn2K7hls" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                } else if (number === '18') {
                    content = '<iframe width="560" height="315" src="https://www.youtube.com/embed/s3wNuru4U0I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                } else if (number === '24') {
                    content = '<iframe width="560" height="315" src="https://www.youtube.com/embed/9p97sxREC00" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                } else {
                    content = `<img src="images/${number}.jpg" alt="Bild ${number}">`;
                }
                modalContent.innerHTML = content;
                modal.style.display = 'flex';
            });
        });

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
            modalContent.innerHTML = '';
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                modalContent.innerHTML = '';
            }
        });
    </script>
</body>
</html>
