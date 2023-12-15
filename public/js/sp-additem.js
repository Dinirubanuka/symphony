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
    var keyBoardId = document.getElementById('Keyboard');
    var bandId = document.getElementById('band');
    var AudioId = document.getElementById('Audio');
    var PercussionId = document.getElementById('Percussion');
    var bandOrchestraCategories = document.getElementById('bandOrchestraCategories');
    var woodwindId = document.getElementById('woodwing');
    var brassId = document.getElementById('brass');
    var StringId = document.getElementById('string');

    if (categorySelect.value === 'Keyboard') {
        keyBoardId.classList.remove('Keyboard');
    } else {
        keyBoardId.classList.add('Keyboard');
    }
    if (categorySelect.value === 'Band and Orchestra') {
        bandId.classList.remove("band");
    } else {
        bandId.classList.add("band");
    }
    if (categorySelect.value === "Audio") {
        AudioId.classList.remove("Audio");
    } else {
        AudioId.classList.add("Audio");
    }
    if (categorySelect.value === "Percussion") {
        PercussionId.classList.remove("Percussion");
    } else {
        PercussionId.classList.add("Percussion");
    }

    // band and orchestra
    if (bandOrchestraCategories.value === "Woodwind" && categorySelect.value === 'Band and Orchestra') {
        woodwindId.classList.remove("woodwing");
    } else {
        woodwindId.classList.add("woodwing");
    }
    if (bandOrchestraCategories.value === "Brass" && categorySelect.value === 'Band and Orchestra') {
        brassId.classList.remove("brass");
    } else {
        brassId.classList.add("brass");
    }
    if (bandOrchestraCategories.value === "String" && categorySelect.value === 'Band and Orchestra') {
        StringId.classList.remove("string");
    } else {
        StringId.classList.add("string");
    }
    updateSubBrandOptions();
}
function updateSubBrandOptions(){
    var categorySelect = document.getElementById("categorySelect");
    var bandOrchestraCategories = document.getElementById("bandOrchestraCategories");
    var keyBoardCategory = document.getElementById("keyboardCategories");
    var brandSelect = document.getElementById("brandSelect");
    var homeAudio = document.getElementById("homeAudioCategory");
    var WoodwindCategories = document.getElementById("WoodwindCategories");
    var brassCategories = document.getElementById("brassCategories");
    var stringCategories = document.getElementById("stringCategories");
    var drumsCategories = document.getElementById("drumsCategories");

    brandSelect.innerHTML = '';

    if (categorySelect.value === 'Electric Guitars') {
        // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        addBrandOption('Yamaha');
        addBrandOption('Gibson');
        addBrandOption('PRS');
        addBrandOption('Ibanez');
        addBrandOption('Jackson');
        addBrandOption('Schecter');
        addBrandOption('ESP');
        addBrandOption('Epiphone');
        addBrandOption('Gretsch');
        addBrandOption('Squier');
        addBrandOption('Tokai');
        addBrandOption('Lakland');
        addBrandOption('Sadowsky');
        addBrandOption('Spector');
        addBrandOption('Warwick');
        addBrandOption('Sandberg');
        addBrandOption('Dingwall');
    } else if (categorySelect.value === 'Acoustic Guitars') {
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
        addBrandOption('Alhambra');
        addBrandOption('Cordoba');
        addBrandOption('Ortega');
        addBrandOption('Eko');
        addBrandOption('Kremona');

    }else if (categorySelect.value === 'Keyboard') {
        if (keyBoardCategory.value === 'organs'){
            addBrandOption('Lowrey');
            addBrandOption('Kimball');
            addBrandOption('Hammond');
            addBrandOption('Baldwin');
            addBrandOption('Gulbransen');
            addBrandOption('Conn');
            addBrandOption('Farfisa');
            addBrandOption('Roland');
            addBrandOption('Vox');
        } else if (keyBoardCategory.value === 'piano'){
            addBrandOption('Yamaha');
            addBrandOption('Steinway & Sons');
            addBrandOption('Bosendorfer');
            addBrandOption('Kawai');
            addBrandOption('Fazioli');
            addBrandOption('Bechstein');
            addBrandOption('Mason & Hamlin');
            addBrandOption('Blüthner');
            addBrandOption('Estonia');
            addBrandOption('Schimmel');
            addBrandOption('Baldwin');
            addBrandOption('Petrof');
            addBrandOption('Grotrian');
            addBrandOption('Knabe');
            addBrandOption('August Förster');
            addBrandOption('Samick');
            addBrandOption('Essex (Steinway & Sons)');
            addBrandOption('W. Hoffmann');
            addBrandOption('Roland');
            addBrandOption('Casio');
        }
    }else if (categorySelect.value === 'Band and Orchestra') {
        if (bandOrchestraCategories.value === "Woodwind") {
            if (WoodwindCategories.value === "Flutes") {
                addBrandOption('Yamaha');
                addBrandOption('Armstrong');
                addBrandOption('Trevor James');
                addBrandOption('Powell');
            } else if (WoodwindCategories.value === "Saxophones") {
                addBrandOption('Yamaha');
                addBrandOption('Selmer');
                addBrandOption('Yanagisawa');
                addBrandOption('Keilwerth');
                addBrandOption('Cannonball');
                addBrandOption('Buffet Crampon');
                addBrandOption('Jupiter');
                addBrandOption('Eastman');
                addBrandOption('Conn-Selmer');
            } else if (WoodwindCategories.value === "Clarinets") {
                addBrandOption('Yamaha');
                addBrandOption('Selmer');
                addBrandOption('Buffet Crampon');
                addBrandOption('Backun');
                addBrandOption('Leblanc');
                addBrandOption('Clark W Fobes');
                addBrandOption('R13');
                addBrandOption('Vandoren');
                addBrandOption('Schreiber');
            }
        } else if (bandOrchestraCategories.value === "Brass") {
            if (brassCategories.value === 'trumphet') {
                addBrandOption('Bach');
                addBrandOption('Yamaha');
                addBrandOption('KGUBrass');
                addBrandOption('Schiller');
                addBrandOption('Jupiter');
                addBrandOption('Conn');
                addBrandOption('King');
                addBrandOption('Selmer');
                addBrandOption('Olds');
                addBrandOption('New Brand');
                addBrandOption('BerkeleyWind');
                addBrandOption('Holton');

            } else if (brassCategories.value === 'trombones') {
                addBrandOption('Bach');
                addBrandOption('Schiller');
                addBrandOption('Jupiter');
                addBrandOption('New Brand');
                addBrandOption('Shires');
                addBrandOption('Conn');
                addBrandOption('Glenn Cronkhite');
                addBrandOption('Yamaha');
                addBrandOption('Olds');
                addBrandOption('King');
                addBrandOption('Holton');
                addBrandOption('Getzen');

            } else if (brassCategories.value === 'frenchHorns') {
                addBrandOption('Yamaha');
                addBrandOption('Schiller');
                addBrandOption('Eastman');
                addBrandOption('Holton');
                addBrandOption('USSR');
                addBrandOption('Glenn Cronkhite');
                addBrandOption('Alexander');
                addBrandOption('Jupiter');
                addBrandOption('Hans Hoyer');
                addBrandOption('C.G. Conn');
                addBrandOption('King');
                addBrandOption('Getzen');
            }
        } else if (bandOrchestraCategories.value === "String") {
            if (stringCategories.value === 'violins') {
                addBrandOption('Rozannas Violins');
                addBrandOption('Unknown');
                addBrandOption('D Z Strad');
                addBrandOption('Unbranded');
                addBrandOption('Suzuki');
                addBrandOption('Sky Music');
                addBrandOption('Stentor');
                addBrandOption('Violin');
                addBrandOption('Vienna Strings');
                addBrandOption('Oqan');
                addBrandOption('Paititi');

            } else if (stringCategories.value === 'cellos') {
                addBrandOption('D Z Strad');
                addBrandOption('Pirastro');
                addBrandOption('Oqan');
                addBrandOption('Wittner');
                addBrandOption('Cello');
                addBrandOption('Larsen');
                addBrandOption('NS Design');
                addBrandOption('Stentor');
                addBrandOption('Jargar');
                addBrandOption('Vienna Strings');
                addBrandOption('Thomastik-Infeld');

            } else if (stringCategories.value === 'violas') {
                addBrandOption('D Z Strad');
                addBrandOption('Super-Sensitive');
                addBrandOption('Rozannas Violins');
                addBrandOption('Pirastro');
                addBrandOption('Opal');
                addBrandOption('OEM');
                addBrandOption('Sky Music');
                addBrandOption('Thomastik-Infeld');
                addBrandOption('Viola');
                addBrandOption('Strumenti');
            }
        }
    }else if (categorySelect.value === 'Audio') {
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

        } else if (homeAudio.value === "speakers") {
            addBrandOption('Mackie');
            addBrandOption('JBL');
            addBrandOption('Genelec');
            addBrandOption('Yamaha');
            addBrandOption('Behringer');
            addBrandOption('Samson');
            addBrandOption('PreSonus');
            addBrandOption('Tone Tubby');
            addBrandOption('Focal');
            addBrandOption('QSC');
            addBrandOption('KRK');
            addBrandOption('HK Audio');


        }else if (homeAudio.value === "Amplifiers") {
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

        }else if (homeAudio.value === "Microphones") {
            addBrandOption('Shure');
            addBrandOption('AKG');
            addBrandOption('Sennheiser');
            addBrandOption('Neumann');
            addBrandOption('Audio-Technica');
            addBrandOption('Electro-Voice');
            addBrandOption('sE Electronics');
            addBrandOption('Samson');
            addBrandOption('CAD');
            addBrandOption('Oktava');
            addBrandOption('Warm Audio');
            addBrandOption('RODE');


        }else if (homeAudio.value === "Mixers") {
            addBrandOption('Behringer');
            addBrandOption('Mackie');
            addBrandOption('Yamaha');
            addBrandOption('Allen & Heath');
            addBrandOption('Aviom');
            addBrandOption('Soundcraft');
            addBrandOption('Boss');
            addBrandOption('Midas');
            addBrandOption('PreSonus');
            addBrandOption('TASCAM');
            addBrandOption('Solid State Logic');
            addBrandOption('Studer');

        }else if (homeAudio.value === "Recording") {
            addBrandOption('TASCAM');
            addBrandOption('Pro Audio LA');
            addBrandOption('MRL');
            addBrandOption('Ampex');
            addBrandOption('Zoom');
            addBrandOption('Studer');
            addBrandOption('Akai');
            addBrandOption('Sony');
            addBrandOption('Yamaha');
            addBrandOption('Fostex');
        }
    }else if (categorySelect.value === 'Percussion') {
        if (drumsCategories.value === 'Cymbals'){
            addBrandOption('Bosphorus');
            addBrandOption('Masterwork');
            addBrandOption('Mehteran Cymbals');
            addBrandOption('Pergamon');
            addBrandOption('Diril Cymbals');
            addBrandOption('Agean Cymbals');
            addBrandOption('Istanbul Agop');
            addBrandOption('Sabian');
            addBrandOption('Agean');
            addBrandOption('Zildjian');
            addBrandOption('Paiste');
            addBrandOption('Istanbul Mehmet');
        }else if (drumsCategories.value === 'Drums'){
            addBrandOption('Bosphorus');
            addBrandOption('Masterwork');
            addBrandOption('Mehteran Cymbals');
            addBrandOption('Pergamon');
            addBrandOption('Diril Cymbals');
            addBrandOption('Agean Cymbals');
            addBrandOption('Sabian');
            addBrandOption('Meinl');
            addBrandOption('Istanbul Agop');
            addBrandOption('Tama');
            addBrandOption('Zildjian');
            addBrandOption('Agean');
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
