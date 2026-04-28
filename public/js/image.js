const removeBtn = document.getElementById('remove-image');
const input = document.getElementById('image-input')
const preview = document.getElementById('preview')

input.addEventListener('change', function(e) {
    const file = e.target.files[0];

    if (file) {
        const url = URL.createObjectURL(file);
        const img = document.getElementById('preview');
        img.src = url;
        img.style.display = 'block';

        removeBtn.style.display = 'inline';
    }
});

removeBtn.addEventListener('click', function(){
    preview.src = '';
    preview.style.display = 'none';
    input.value = '';
    removeBtn.style.display = 'none';
});

