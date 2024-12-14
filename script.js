document.addEventListener('DOMContentLoaded', () => {
    function formatDate(date) {
        const daysOfWeek = ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"];
        const months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];

        const dayOfWeek = daysOfWeek[date.getDay()];
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();

        return `${dayOfWeek}, ${day} ${month} ${year}`;
    }

    function formatTime(date) {
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        return `${hours}:${minutes}:${seconds}`;
    }

    function updateDateTime() {
        const now = new Date();
        const formattedDate = formatDate(now);
        const formattedTime = formatTime(now);
        document.getElementById('currentDate').innerText = `${formattedDate} - ${formattedTime}`;
    }

    // Cập nhật thời gian ngay lập tức khi tải trang và sau mỗi giây
    updateDateTime();
    setInterval(updateDateTime, 1000);
});
