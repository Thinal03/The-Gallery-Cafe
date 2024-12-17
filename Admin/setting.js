const express = require('express');
const bodyParser = require('body-parser');
const multer = require('multer');
const fs = require('fs');

const app = express();
const port = 3000;

// Middleware to serve static files
app.use(express.static('public'));

// Middleware to parse form data
const upload = multer({ dest: 'uploads/' });
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Endpoint to handle form submission
app.post('/api/settings', upload.single('logo'), (req, res) => {
    const settings = {
        siteTitle: req.body.siteTitle,
        siteDescription: req.body.siteDescription,
        adminEmail: req.body.adminEmail,
        timezone: req.body.timezone,
        maintenanceMode: req.body.maintenanceMode === 'on',
        logo: req.file ? req.file.filename : null
    };

    fs.writeFile('settings.json', JSON.stringify(settings, null, 2), (err) => {
        if (err) {
            console.error('Error writing settings file:', err);
            return res.status(500).send('Error saving settings');
        }

        res.send('Settings saved successfully');
    });
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:58974${port}`);
});