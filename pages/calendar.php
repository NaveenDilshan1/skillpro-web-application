<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #8be7eeff; }
        h1 { text-align: center; }
        .calendar-controls { text-align: center; margin-bottom: 10px; }
        .calendar-controls button { padding: 5px 10px; margin: 0 5px; }
        .calendar { display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px; max-width: 900px; margin: auto; }
        .day { background: white; padding: 10px; border-radius: 5px; text-align: center; min-height: 80px; position: relative; }
        .day .date { font-weight: bold; }
        .event { background: #81ee05ff; color: white; font-size: 12px; padding: 2px 4px; border-radius: 3px; margin-top: 5px; display: block; }
    </style>
</head>
<body>

<h1>Event Calendar</h1>

<div class="calendar-controls">
    <button id="prevMonth">Previous Month</button>
    <span id="monthYear"></span>
    <button id="nextMonth">Next Month</button>
</div>

<div id="calendar" class="calendar"></div>

<script>
const events = [
    { date: '2025-09-25', title: 'Course Start: Web Development Fundamentals' },
    { date: '2025-10-01', title: 'Workshop: JavaScript Basics' },
    { date: '2025-10-10', title: 'Exam: HTML & CSS' },
    { date: '2025-10-15', title: 'Course Start: Python Programming' },
    { date: '2025-10-20', title: 'Workshop: React JS' },
    { date: '2025-10-25', title: 'Exam: Python Basics' },
    { date: '2025-11-05', title: 'Seminar: Advanced JS' },
    { date: '2025-12-05', title: 'Course Start: Mobile App Development'},
    { date: '2025-12-11', title: 'Course Start: Data Science & Analytics'},
    { date: '2025-12-13', title: 'Course Start: Advanced Welding Techniques'},
    { date: '2025-12-16', title: 'Course Start: Electrical Installation'},
    { date: '2025-12-20', title: 'Course Start: Plumbing & Pipe Fitting'},
    { date: '2025-12-23', title: 'Course Start: Hotel Management Diploma'},
    { date: '2025-12-28', title: 'Course Start: Tourism & Travel Management'}

    
    
];

let currentYear = new Date().getFullYear();
let currentMonth = new Date().getMonth(); // 0-11

const calendar = document.getElementById('calendar');
const monthYear = document.getElementById('monthYear');
const prevBtn = document.getElementById('prevMonth');
const nextBtn = document.getElementById('nextMonth');

function generateCalendar(year, month) {
    calendar.innerHTML = ''; // clear previous calendar

    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const startDay = firstDay.getDay();
    const totalDays = lastDay.getDate();

    const monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    monthYear.innerText = `${monthNames[month]} ${year}`;

    // empty boxes before first day
    for (let i = 0; i < startDay; i++) {
        const emptyDiv = document.createElement('div');
        calendar.appendChild(emptyDiv);
    }

    // create days
    for (let day = 1; day <= totalDays; day++) {
        const dayDiv = document.createElement('div');
        dayDiv.classList.add('day');

        const dateSpan = document.createElement('span');
        dateSpan.classList.add('date');
        dateSpan.innerText = day;
        dayDiv.appendChild(dateSpan);

        const fullDate = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
        events.forEach(event => {
            if(event.date === fullDate){
                const eventDiv = document.createElement('span');
                eventDiv.classList.add('event');
                eventDiv.innerText = event.title;
                dayDiv.appendChild(eventDiv);
            }
        });

        calendar.appendChild(dayDiv);
    }
}

// Button functionality
prevBtn.addEventListener('click', () => {
    currentMonth--;
    if(currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar(currentYear, currentMonth);
});

nextBtn.addEventListener('click', () => {
    currentMonth++;
    if(currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar(currentYear, currentMonth);
});

// initial calendar
generateCalendar(currentYear, currentMonth);
</script>

</body>
</html>

