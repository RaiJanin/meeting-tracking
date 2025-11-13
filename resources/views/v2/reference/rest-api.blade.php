<meta name="csrf-token" content="{{ csrf_token() }}">

<form id="infoForm" class="p-6 border rounded-lg">
    <input type="text" name="name" placeholder="Full Name" class="border p-2 w-full mb-2">
    <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-2">
    <input type="text" name="phone" placeholder="Phone" class="border p-2 w-full mb-2">
    <textarea name="remarks" placeholder="Remarks" class="border p-2 w-full mb-2"></textarea>
</form>

<!-- ✅ Save button outside the form -->
<div class="mt-4">
    <button id="saveBtn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save</button>
</div>

<script>
document.getElementById('saveBtn').addEventListener('click', function () {
    const form = document.getElementById('infoForm');
    const formData = new FormData(form);

    fetch('/app/save-form', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('✅ ' + data.message);
        } else {
            alert('⚠️ Something went wrong.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('❌ Error submitting form: ' + error.message);
    })
    .finally(() => {
        console.log('Form submission complete');
    });
});
</script>
