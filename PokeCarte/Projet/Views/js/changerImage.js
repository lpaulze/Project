


    document.getElementById('logoInput').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('current-logo').src = URL.createObjectURL(file);
        }
    });



    document.getElementById('stampInput').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('current-stamp').src = URL.createObjectURL(file);
        }
    });
