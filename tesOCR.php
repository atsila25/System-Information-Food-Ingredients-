<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Example</title>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v2.1.4/dist/tesseract.min.js"></script>
</head>
<body>
    <h1>OCR Example</h1>
    <input type="file" id="fileInput">
    <div id="output"></div>

    <script>
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const img = new Image();
                    img.src = reader.result;
                    img.onload = function() {
                        Tesseract.recognize(img, 'eng', {
                            logger: m => console.log(m)
                        }).then(({ data: { text } }) => {
                            document.getElementById('output').textContent = text;
                        });
                    };
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <div>var</div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Example</title>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v2.1.4/dist/tesseract.min.js"></script>
</head>
<body>
    <h1>OCR Example</h1>
    <input type="file" id="fileInput">
    <div id="output"></div>
    <input type="text" id="newInput" placeholder="Enter text to compare">
    <button onclick="compareText()">Compare Text</button>
    <div id="comparisonResult"></div>

    <script>
        let ocrOutput = '';

        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const img = new Image();
                    img.src = reader.result;
                    img.onload = function() {
                        Tesseract.recognize(img, 'eng', {
                            logger: m => console.log(m)
                        }).then(({ data: { text } }) => {
                            ocrOutput = text;
                            document.getElementById('output').textContent = text;
                        });
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        function compareText() {
            const newInput = document.getElementById('newInput').value;
            if (ocrOutput.includes(newInput)) {
                document.getElementById('comparisonResult').textContent = 'tidak aman';
            } else {
                document.getElementById('comparisonResult').textContent = 'produk aman';
            }
        }
    </script>
</body>
</html>
