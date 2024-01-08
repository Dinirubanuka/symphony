function previewImage(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const file = fileInput.files[0];
    const reader = new FileReader();
  
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
  
    if (file) {
      reader.readAsDataURL(file);
    }
  }
  
  function previewImages(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const files = fileInput.files;
  
    preview.innerHTML = '';
    for (let i = 0; i < files.length && i < 3; i++) {
      const file = files[i];
      const reader = new FileReader();
  
      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.width = 200;
        preview.appendChild(img);
      };
  
      reader.readAsDataURL(file);
    }
  }
  
  document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // You can handle form submission here, e.g., sending data to a server
    // Retrieve form data using document.getElementById('elementId').value
    // Perform actions with the form data
    // Example:
    // const formData = new FormData(this);
    // const ownerName = formData.get('ownerName');
    // const equipmentDescription = formData.get('equipmentDescription');
    // Handle the form data as required
  });
  