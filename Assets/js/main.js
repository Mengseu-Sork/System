document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;
    const links = document.querySelectorAll('.sidebar-link');

    links.forEach(link => {
      const href = link.getAttribute('href');

      if (href === currentPath) {
        link.classList.add('bg-green-500', 'text-white');
        link.querySelectorAll('i, span').forEach(el => {
          el.classList.remove('text-gray-500', 'text-green-500');
          el.classList.add('text-white');
        });
      }
    });
  });

    
    function searchProducts() {
        let input = document.getElementById("searchInput").value.toLowerCase().trim();
        let table = document.getElementById("productsTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName("td");

            if (cells.length > 0) {
                let name = cells[1].innerText.toLowerCase().trim();
                let price = cells[2].innerText.toLowerCase().trim(); 
                let category = cells[4].innerText.toLowerCase().trim(); 


                if (name.includes(input) || price.includes(input) || category.includes(input)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        if (input === "") {
            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = "";
            }
        }
    }



    // Filter products by category
    function filterByCategory(category) {
        const rows = document.querySelectorAll("#product-table-body tr");
        rows.forEach(row => {
            const productCategory = row.getAttribute("data-category").toLowerCase();
            if (category === "" || productCategory === category.toLowerCase()) {
                row.style.display = ""; 
            } else {
                row.style.display = "none";
            }
        });
    }

    // Open modal for deletion
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    // Close modal for deletion
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function toggleDropdown(id) {
    const dropdown = document.getElementById('actionDropdown' + id);
    dropdown.classList.toggle('hidden');
}

function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };

        reader.readAsDataURL(file);
    }
}

// Drag & Drop functionality
const dropZone = document.getElementById('drop-zone');
const imageInput = document.getElementById('image');

dropZone.addEventListener('dragover', function (e) {
    e.preventDefault();
    dropZone.classList.add('border-blue-500');
});

dropZone.addEventListener('dragleave', function () {
    dropZone.classList.remove('border-blue-500');
});

dropZone.addEventListener('drop', function (e) {
    e.preventDefault();
    dropZone.classList.remove('border-blue-500');

    const files = e.dataTransfer.files;
    if (files.length > 0) {
        imageInput.files = files;
        previewImage(imageInput);
    }
});