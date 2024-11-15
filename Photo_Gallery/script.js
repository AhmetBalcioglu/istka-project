// Resim verisi
const images = [
    { id: 1, title: "Göller", category: "Doğa", src: "https://via.placeholder.com/300x200?text=Doğa+1", date: "2024-01-01" },
    { id: 2, title: "Yüksek Binalar", category: "Mimari", src: "https://via.placeholder.com/300x200?text=Mimari+1", date: "2024-02-15" },
    { id: 3, title: "Köy Manzarası", category: "Doğa", src: "https://via.placeholder.com/300x200?text=Doğa+2", date: "2024-03-10" },
    { id: 4, title: "Şehir Silueti", category: "Mimari", src: "https://via.placeholder.com/300x200?text=Mimari+2", date: "2023-12-25" },
    { id: 5, title: "Gökkuşağı", category: "Doğa", src: "https://via.placeholder.com/300x200?text=Doğa+3", date: "2024-04-05" }
];

// DOM elemanları
const galleryContainer = document.getElementById('gallery-container');
const filterAllButton = document.getElementById('filter-all');
const filterNatureButton = document.getElementById('filter-nature');
const filterArchitectureButton = document.getElementById('filter-architecture');
const sortDateButton = document.getElementById('sort-date');
const sortTitleButton = document.getElementById('sort-title');

// Resimleri ekrana yerleştirme fonksiyonu
function displayImages(imagesToDisplay) {
    galleryContainer.innerHTML = ''; // Mevcut içerikleri temizle

    imagesToDisplay.forEach(image => {
        const imageElement = document.createElement('div');
        imageElement.classList.add('gallery-item');
        imageElement.innerHTML = `
            <img src="${image.src}" alt="${image.title}">
            <h3>${image.title}</h3>
        `;
        galleryContainer.appendChild(imageElement);
    });
}

// Filtreleme butonları
filterAllButton.addEventListener('click', () => displayImages(images));
filterNatureButton.addEventListener('click', () => displayImages(images.filter(img => img.category === 'Doğa')));
filterArchitectureButton.addEventListener('click', () => displayImages(images.filter(img => img.category === 'Mimari')));

// Sıralama butonları
sortDateButton.addEventListener('click', () => {
    const sortedByDate = [...images].sort((a, b) => new Date(b.date) - new Date(a.date));
    displayImages(sortedByDate);
});

sortTitleButton.addEventListener('click', () => {
    const sortedByTitle = [...images].sort((a, b) => a.title.localeCompare(b.title));
    displayImages(sortedByTitle);
});

// Sayfa ilk yüklendiğinde tüm resimleri göster
displayImages(images);
