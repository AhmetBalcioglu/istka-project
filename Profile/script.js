document.getElementById('welcome-btn').addEventListener('click', function () {
    document.getElementById('welcome-message').style.display = 'flex';
});

document.getElementById('close-btn').addEventListener('click', function () {
    document.getElementById('welcome-message').style.display = 'none';
});
