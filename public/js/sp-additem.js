// add photo
function triggerInput(id){
    document.getElementById("photo_"+id).click();
}
function previewImage(input, imgId) {
    var preview = document.getElementById(imgId);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// categories and brands dynamically
function updateBrandOptions() {
    var categorySelect = document.getElementById('categorySelect');
    var bandOrchestraCategories = document.getElementById("bandOrchestraCategories");
    var homeAudio = document.getElementById("homeAudioCategory");

    if (categorySelect.value === "Band_And_Orchestra") {
        bandOrchestraCategories.style.display = "block";
    } else {
        bandOrchestraCategories.style.display = "none";
    }
    if (categorySelect.value === "Home_Audi") {
        homeAudio.style.display = "block";
    } else {
        homeAudio.style.display = "none";
    }
    updateSubBrandOptions();
}
function updateSubBrandOptions(){
    var categorySelect = document.getElementById("categorySelect");
    var subcategorySelect = document.getElementById("bandOrchestraCategories");
    var brandSelect = document.getElementById("brandSelect");
    var homeAudio = document.getElementById("homeAudioCategory");

    brandSelect.innerHTML = '';

    // var addBrandOption = [];

    if (categorySelect.value === 'Electric_Guitars') {
        // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        addBrandOption('Yamaha');
        addBrandOption('Gibson');
        addBrandOption('Epiphone');
        addBrandOption('Ibanez');
        addBrandOption('Jackson');
        addBrandOption('Schecter');
        addBrandOption('ESP');
        addBrandOption('Washburn');
        addBrandOption('Charvel');

    } else if (categorySelect.value === 'Acoustic_Guitars') {
        // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        addBrandOption('Yamaha');
        addBrandOption('Gibson');
        addBrandOption('Epiphone');
        addBrandOption('Ibanez');
        addBrandOption('Jackson');
        addBrandOption('Schecter');
        addBrandOption('ESP');
        addBrandOption('Washburn');
        addBrandOption('Charvel');

    }else if (categorySelect.value === 'Keyboard') {
        addBrandOption('Yamaha');
        addBrandOption('Roland');
        addBrandOption('Korg');
        addBrandOption('Casio');
        addBrandOption('Nord');
        addBrandOption('Moog');
        addBrandOption('Kurzweil');
        addBrandOption('Novation');
        addBrandOption('Arturia');

    } else if (categorySelect.value === 'Amps') {
        addBrandOption('Fender');
        addBrandOption('Marshall');
        addBrandOption('Messa/Boogie');
        addBrandOption('Peavey');
        addBrandOption('Ampeg');
        addBrandOption('Blackstar Amplification');
        addBrandOption('Roland');
        addBrandOption('Bugera');
        addBrandOption('Hartke');

    }else if (categorySelect.value === 'Bass_Guitars') {
        // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        addBrandOption('Yamaha');
        addBrandOption('Gibson');
        addBrandOption('Epiphone');
        addBrandOption('Ibanez');
        addBrandOption('Jackson');
        addBrandOption('Schecter');
        addBrandOption('ESP');
        addBrandOption('Washburn');
        addBrandOption('Charvel');

    }else if (categorySelect.value === 'Band_And_Orchestra') {
        if (subcategorySelect.value === "Woodwind") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Buffet Crampon');
            addBrandOption('Jupiter');
            addBrandOption('Gemeinhardt');
            addBrandOption('Pearl');
            addBrandOption('Trevor James');
            addBrandOption('Fox');
            addBrandOption('Vandoren');

        } else if (subcategorySelect.value === "Saxophones") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Yanagisawa');
            addBrandOption('Keilwerth');
            addBrandOption('Cannonball');
            addBrandOption('Buffet Crampon');
            addBrandOption('Jupiter');
            addBrandOption('Eastman');
            addBrandOption('Conn-Selmer');

        } else if (subcategorySelect.value === "Flutes") {
            addBrandOption('Yamaha');
            addBrandOption('Armstrong');
            addBrandOption('Trevor James');
            addBrandOption('Powell');

        }else if (subcategorySelect.value === "Clarinets") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Buffet Crampon');
            addBrandOption('Backun');
            addBrandOption('Leblanc');
            addBrandOption('Clark W Fobes');
            addBrandOption('R13');
            addBrandOption('Vandoren');
            addBrandOption('Schreiber');

        } else if (subcategorySelect.value === "Brass") {
            addBrandOption('Yamaha');
            addBrandOption('Gibson');
            addBrandOption('Epiphone');
            addBrandOption('Ibanez');
            addBrandOption('Jackson');
            addBrandOption('Schecter');
            addBrandOption('ESP');
            addBrandOption('Washburn');
            addBrandOption('Charvel');

        }else if (subcategorySelect.value === "Trumpets") {
            addBrandOption('Yamaha');
            addBrandOption('Schilke');
            addBrandOption('Getzen');
            addBrandOption('Conn-Selmer');
            addBrandOption('Jupiter');
            addBrandOption('King');
            addBrandOption('Holton');
            addBrandOption('Besson');
            addBrandOption('Stomvi');

        } else if (subcategorySelect.value === "String") {
            addBrandOption('Yamaha');
            addBrandOption('Gibson');
            addBrandOption('Epiphone');
            addBrandOption('Ibanez');
            addBrandOption('Jackson');
            addBrandOption('Schecter');
            addBrandOption('ESP');
            addBrandOption('Washburn');
            addBrandOption('Charvel');

        }else{
            addBrandOption('Yamaha');
            addBrandOption('Gibson');
            addBrandOption('Epiphone');
            addBrandOption('Ibanez');
            addBrandOption('Jackson');
            addBrandOption('Schecter');
            addBrandOption('ESP');
            addBrandOption('Washburn');
            addBrandOption('Charvel');

        }

    }else if (categorySelect.value === 'Home_Audi') {
        if (homeAudio.value === "Headphones") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Buffet Crampon');
            addBrandOption('Jupiter');
            addBrandOption('Gemeinhardt');
            addBrandOption('Pearl');
            addBrandOption('Trevor James');
            addBrandOption('Fox');
            addBrandOption('Vandoren');

        } else if (homeAudio.value === "Receivers") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Yanagisawa');
            addBrandOption('Keilwerth');
            addBrandOption('Cannonball');
            addBrandOption('Buffet Crampon');
            addBrandOption('Jupiter');
            addBrandOption('Eastman');
            addBrandOption('Conn-Selmer');

        } else if (homeAudio.value === "Amplifiers") {
            addBrandOption('Yamaha');
            addBrandOption('Armstrong');
            addBrandOption('Trevor James');
            addBrandOption('Powell');

        }else if (homeAudio.value === "Floor speakers") {
            addBrandOption('Yamaha');
            addBrandOption('Selmer');
            addBrandOption('Buffet Crampon');
            addBrandOption('Backun');
            addBrandOption('Leblanc');
            addBrandOption('Clark W Fobes');
            addBrandOption('R13');
            addBrandOption('Vandoren');
            addBrandOption('Schreiber');

        } else if (homeAudio.value === "Subwoofers") {
            addBrandOption('Yamaha');
            addBrandOption('Gibson');
            addBrandOption('Epiphone');
            addBrandOption('Ibanez');
            addBrandOption('Jackson');
            addBrandOption('Schecter');
            addBrandOption('ESP');
            addBrandOption('Washburn');
            addBrandOption('Charvel');

        }else if (homeAudio.value === "Tape Decks") {
            addBrandOption('Yamaha');
            addBrandOption('Schilke');
            addBrandOption('Getzen');
            addBrandOption('Conn-Selmer');
            addBrandOption('Jupiter');
            addBrandOption('King');
            addBrandOption('Holton');
            addBrandOption('Besson');
            addBrandOption('Stomvi');

        }else if (homeAudio.value === "Turntables") {
            addBrandOption('Yamaha');
            addBrandOption('Schilke');
            addBrandOption('Getzen');
            addBrandOption('Conn-Selmer');
            addBrandOption('Jupiter');
            addBrandOption('King');
            addBrandOption('Holton');
            addBrandOption('Besson');
            addBrandOption('Stomvi');

        }
    }
}

function addBrandOption(brand) {
    var brandSelect = document.getElementById('brandSelect');
    var option = document.createElement('option');
    option.value = brand;
    option.text = brand;
    brandSelect.add(option);
}

updateBrandOptions();
