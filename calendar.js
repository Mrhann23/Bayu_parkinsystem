document.addEventListener("DOMContentLoaded", function() {
    let calendar = document.getElementById('calendar');

    let today = new Date();
    let thisMonth = today.getMonth() + 1;
    let thisYear = today.getFullYear();

    let calendarHtml = "";
    for (let i = 1; i <= 31; i++) {
        let date = `${thisYear}-${String(thisMonth).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
        let memoText = memos[date] ? `<div class="memo">${memos[date]}</div>` : "";
        calendarHtml += `<div class="calendar-day" data-date="${date}">${i}${memoText}</div>`;
    }

    calendar.innerHTML = calendarHtml;

    // Highlight memos
    document.querySelectorAll('.calendar-day').forEach(day => {
        day.addEventListener('click', function() {
            let date = this.getAttribute("data-date");
            alert("Selected Date: " + date);
        });
    });
});
