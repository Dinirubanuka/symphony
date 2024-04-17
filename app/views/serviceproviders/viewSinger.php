<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewSinger.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/inventory.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
    <title>Servie Provider Profile</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/singer-nav.php'; ?>
<!--------body-------->
<div class="outer">
    <form action="<?php echo URLROOT; ?>/Serviceproviders/updateSinger/<?php echo $data->product_id ?>" method="post" enctype="multipart/form-data">
        <div class="biggerBody">
            <div class="upperPart">
                <div class="upperLeft">
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <!--                        <div class="photo-inner">-->
                            <img src="http://localhost/symphony/img/serviceProvider/<?php echo $data->singerPhoto ?>"
                                 id="previewPhoto_4"
                                 onclick="triggerInput(4)">
                            <input type="file" id="photo_4" accept=".jpg, .jpeg, .png, .HEIC" name="photo_4"
                                   value="<?php echo $data->singerPhoto; ?>"
                                   onchange="previewImage(this, 'previewPhoto_4')">
<!--                            <input type="file" id="photo_4" accept=".jpg, .jpeg, .png, .HEIC, .heic" name="photo_4"-->
<!--                                   value="--><?php //echo $data->singerPhoto; ?><!--"-->
<!--                                   onchange="previewImage(this, 'previewPhoto_4')">-->
                        </div>
                    </div>
                    <div class="singerNameLoc">
                        <div class="singerName">
                            <h1><input name="singerName" value="<?php echo $data->name; ?>"></h1>
                        </div>
                        <div class="location">
                            <img src="http://localhost/symphony/img/location.png" alt="camera-icon" class="" id=""
                                 style="height: 35px;width: 35px;z-index: 2;" onclick="myfunc()" />
                            <h4 style="color: black"><?php echo $data->location; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="upperRight">
                </div>
            </div>
            <!--second part-->
            <div class="titleHours">
                <div class="edit title">
                    <label>Nick name</label>
                    <h2><input type="text" name="singerNickName" value="<?php echo $data->nickName; ?>"></h2>
                </div>
                <div class="edit mail">
                    <label>Email</label>
                    <h2><input type="text" name="email" value="<?php echo $data->email; ?>"></h2>
                </div>
                <div class="edit number">
                    <label>Number</label>
                    <h2><input type="text" name="number" value="<?php echo $data->telephoneNumber; ?>"></h2>
                </div>
                <div class="edit rate">
                    <label>Rate</label>
                    <h2><input type="text" name="rate" value="<?php echo $data->unit_price; ?>"></h2>
                </div>
            </div>
            <!--middle part-->
            <div class="middle-middle">
                <div class="middle">
                    <div class="decription">
                        <p class="descriptionContent" id="descriptionContent">
                            <input type="text" name="description" value="<?php echo $data->Description; ?>">
                        </p>
                    </div>
                </div>
                <a href="#" id="seeMore" onclick="toggleDescription()" style="color: white">See more...</a>
            </div>
            <div class="upload">
                <!--    upload video-->
                <div class="video-upload">
                    <div class="video-uploadBody">
                        <iframe
                                src="<?php echo $data->videoLink ?>" autoplay=1&mute=1">
                        </iframe>
                    </div>
                    <div class="video-section">
                        <div class="video-link">
                            <label>Add Embedded Source Link</label>
                            <h2><input type="text" id="link" name="videoLink" value="<?php echo $data->videoLink; ?>" onchange="extractVideoId()"></h2>
                        </div>
                        <div class="select-options">
                            <!--            location-->
                            <div class="title locations" id="locations" style="padding: 10px">
                                <div class="dropdown2">
                                    <div class="select-box" onclick="toggleOptions('location')">
                                        Select location
                                        <div class="arrow"></div>
                                    </div>
                                    <div class="options optionsLocation">

                                    </div>
                                </div>
                            </div>
                            <!--            instrument-->
                            <div class="title instrument" id="Instrument" style="padding: 10px">
                                <div class="dropdown2">
                                    <div class="select-box" onclick="toggleOptions('instrument')">
                                        instruments
                                        <div class="arrow"></div>
                                    </div>
                                    <div class="options optionsInstrument">
                                        <div class="option">
                                            <input type="checkbox" id="" name="Accordion" value="Accordion">
                                            Accordion
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Bansuri" value="Bansuri">
                                            Bansuri
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="BassDrum" value="BassDrum">
                                            Bass Drum
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Bassoon" value="Bassoon">
                                            Bassoon
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Cajon" value="Cajon">
                                            Cajon
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Chime" value="Chime">
                                            Chime
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Clarinet" value="Clarinet">
                                            Clarinet
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Congas" value="Congas">
                                            Congas
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="DigitalPiano" value="DigitalPiano">
                                            Digital Piano
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Didgeridoo" value="Didgeridoo">
                                            Didgeridoo
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Dizi" value="Dizi">
                                            Dizi
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Djembe" value="Djembe">
                                            Djembe
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="DoubleBass" value="DoubleBass">
                                            Double Bass
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="DrumSet" value="DrumSet">
                                            Drum Set
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="ElectricGuitar" value="ElectricGuitar">
                                            Electric Guitar
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Erhu" value="Erhu">
                                            Erhu
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Euphonium" value="Euphonium">
                                            Euphonium
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Flute" value="Flute">
                                            Flute
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="French Horn" value="French Horn">
                                            French Horn
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Guitar" value="Guitar">
                                            Guitar
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Guiro" value="Guiro">
                                            Guiro
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Guzheng" value="Guzheng">
                                            Guzheng
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Harp" value="Harp">
                                            Harp
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Harpsichord" value="Harpsichord">
                                            Harpsichord
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Kalimba" value="Kalimba">
                                            Kalimba
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Kora" value="Kora">
                                            Kora
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Mandolin" value="Mandolin">
                                            Mandolin
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Maracas" value="Maracas">
                                            Maracas
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Marimba" value="Marimba">
                                            Marimba
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Ney" value="Ney">
                                            Ney
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Oboe" value="Oboe">
                                            Oboe
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Organ" value="Organ">
                                            Electric Guitar
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Oud" value="Oud">
                                            Oud
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Piano" value="Piano">
                                            Piano
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Piccolo" value="Piccolo">
                                            Piccolo
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Pipa" value="Pipa">
                                            Pipa
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Quena" value="Quena">
                                            Quena (Andean Flute)
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Recorder" value="Recorder">
                                            Recorder
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Santoor" value="Santoor">
                                            Santoor
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Sarod" value="Sarod">
                                            Sarod
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Saxophone" value="Saxophone">
                                            Saxophone
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Sitar" value="Sitar">
                                            Sitar
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="SnareDrum" value="SnareDrum">
                                            Snare Drum
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Synthesizer" value="Synthesizer">
                                            Synthesizer
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Tabla" value="Tabla">
                                            Tabla
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="TalkingDrum" value="TalkingDrum">
                                            Talking Drum
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Theremin" value="Theremin">
                                            Theremin
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Timpani" value="Timpani">
                                            Timpani
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Trombone" value="Trombone">
                                            Trombone
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Trumpet" value="Trumpet">
                                            Trumpet
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Tuba" value="Tuba">
                                            Tuba
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Ukulele" value="Ukulele">
                                            Ukulele
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Veena" value="Veena">
                                            Veena
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Violin" value="Violin">
                                            ViolinViolin
                                        </div>
                                        <div class="option">
                                            <input type="checkbox" id="" name="Xylophone" value="Xylophone">
                                            Xylophone
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--upload audio-->
                <div class="add-audio">

                </div>
            </div>
        </div>
        <input type="submit" class="submit" value="save" style="display: none">
    </form>
    <input type="submit" onclick="submitForm()" value="save" style="width: 200px;height: 42px;margin: auto">
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="app.js"></script>
<script>
    //add you tube video
    function extractVideoId() {
        var embeddedLink = document.getElementById('embeddedLink').value;

        // Regular expression to match the YouTube video ID in the embedded link
        var match = embeddedLink.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|.*[?&]v=|v\/|watch\?v=))(.*?)(?:[?&]|$)/);

        if (match && match[1]) {
            var videoId = match[1];
        } else {
            alert("Invalid YouTube link. Please enter a valid embedded link.");
        }
    }

    $(document).ready(function () {
        function updateVideo() {
            var videoLink = $('#link').val();
            var videoId = getYouTubeVideoId(videoLink);

            if (videoId) {
                var embedCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                $('.video-uploadBody').html(embedCode);
            }
        }
        $('#link').on('input', function () {
            updateVideo();
        });
        function getYouTubeVideoId(url) {
            var regExp = /^(?:(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11}))(?:\S+)?$/;
            var match = url.match(regExp);
            return (match && match[1]) ? match[1] : null;
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var descriptionContent = document.getElementById('descriptionContent');

        if (descriptionContent.scrollHeight > descriptionContent.clientHeight) {
            executeFunction();
        }
    });

    function executeFunction() {
        var seeMore = document.getElementById('seeMore');
        seeMore.style.display = 'block';
    }

    function toggleDescription() {
        var descriptionContainer = document.getElementById("descriptionContent");
        var seeMoreLink = document.getElementById("seeMore");

        if (descriptionContainer.style.maxHeight) {
            descriptionContainer.style.maxHeight = null;
            seeMoreLink.textContent = "See more...";
        } else {
            descriptionContainer.style.maxHeight = "1000px";
            seeMoreLink.textContent = "See less...";
        }
    }

    var districts = ["Colombo", "Gampaha", "Kandy", "Jaffna", "Matara", "Nuwara Eliya", "Galle", "Matara", "Hambanthota", "Jaffna", "Kilinochchi", "Mannar", "Mullaitivu", "Vavuniya", "Batticola", "Ampara", "Trincomalee", "Kurunegala", "Puttalam", "Anuradhapura", "Polonnaruwa", "Badulla", "Monaragala", "Ratnapura", "Kegalle"];

    var optionsContainer = document.querySelector('.optionsLocation');

    for (var i = 0; i < districts.length; i++) {
        var district = districts[i];
        var liElement = document.createElement("div");
        liElement.classList.add('option');

        var checkboxInput = document.createElement('input');
        checkboxInput.type = 'checkbox';
        checkboxInput.name = district;
        checkboxInput.value = district;

        var labelText = document.createTextNode(district);

        liElement.appendChild(checkboxInput);
        liElement.appendChild(labelText);

        optionsContainer.appendChild(liElement);
    }

    function toggleOptions(selection) {
        if (selection == 'location') {
            var optionsContainer = document.querySelector('.optionsLocation');
            optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        } else {
            var optionsContainer = document.querySelector('.optionsInstrument');
            optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        }

    }

    <?php
    $instrumentList = $data->instrument;
    if ($instrumentList === NULL) {
        $instrumentList = '';
    }
    ?>
    instrumentList = <?php echo json_encode($instrumentList); ?>;
    console.log(instrumentList);
    if (instrumentList.trim() == "NULL") {
        console.log("Instrument is empty");

        locationArray = <?php echo "['" . implode("','", explode(' ', $data->location)) . "']"; ?>;
        console.log('location array', locationArray);

        //view selected locations
        var optionsContainer = document.getElementById('locations');
        if (optionsContainer) {
            optionsContainer.querySelectorAll('.dropdown2 .options .option input[type="checkbox"]').forEach(function (checkbox) {
                var checkboxValue = checkbox.value.trim();
                if (locationArray.includes(checkboxValue)) {
                    checkbox.checked = true;
                }
            });
        } else {
            console.error('optionsContainer is null. Check your selector or HTML structure.');
        }

    } else {
        instrumentArray = <?php echo "['" . implode("','", explode(' ', $data->instrument)) . "']"; ?>;
        console.log('instrument list', instrumentArray);
        locationArray = <?php echo "['" . implode("','", explode(' ', $data->location)) . "']"; ?>;
        console.log('location array', locationArray);

        //view selected locations
        var optionsContainer = document.getElementById('locations');
        if (optionsContainer) {
            optionsContainer.querySelectorAll('.dropdown2 .options .option input[type="checkbox"]').forEach(function (checkbox) {
                var checkboxValue = checkbox.value.trim();
                if (locationArray.includes(checkboxValue)) {
                    checkbox.checked = true;
                }
            });
        } else {
            console.error('optionsContainer is null. Check your selector or HTML structure.');
        }

        //view selected instruments
        var optionsContainer = document.getElementById('Instrument');
        if (optionsContainer) {
            optionsContainer.querySelectorAll('.dropdown2 .options .option input[type="checkbox"]').forEach(function (checkbox) {
                var checkboxValue = checkbox.value.trim();
                if (instrumentArray.includes(checkboxValue)) {
                    checkbox.checked = true;
                }
            });
        } else {
            console.error('optionsContainer is null. Check your selector or HTML structure.');
        }
    }

    // add photo
    function triggerInput(id) {
        document.getElementById("photo_" + id).click();
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

    function submitForm() {
        var checkboxesInstrument = document.querySelectorAll('.optionsInstrument input[type="checkbox"]');
        var checkboxesLocation = document.querySelectorAll('.optionsLocation input[type="checkbox"]');

        var selectedCheckboxes = Array.from(checkboxesInstrument).filter(checkbox => checkbox.checked);
        var selectedLocations = Array.from(checkboxesLocation).filter(checkbox => checkbox.checked);

        var selectedValues = selectedCheckboxes.map(checkbox => checkbox.value);
        var locationValues = selectedLocations.map(checkbox => checkbox.value);

        var locationList = locationValues.join(' ');
        var instrumentList = selectedValues.join(' ');
        console.log('locationList', locationList);
        console.log('instrumentList', instrumentList);
        $.ajax({
            method: 'POST',
            url: 'http://localhost/symphony/serviceproviders/studioInstrument',
            content: 'application/json',
            data: JSON.stringify({instruments: instrumentList, location: locationList}),
            success: function (response) {
                console.log('Backend response:', response);
                document.querySelector('.submit').click();
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }

</script>
</body>
</html>
