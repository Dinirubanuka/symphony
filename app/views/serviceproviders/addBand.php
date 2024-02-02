<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="<?php echo URLROOT?>/css/band.css"/>
<body>
<!-------------register-form----------->
<div class="register">
    <div class="container">
        <p>Band Registration</p>
        <form action="<?php echo URLROOT; ?>/serviceproviders/addband" class="form" method="post"
              enctype="multipart/form-data">
<!--            band name-->
            <div class="input-box">
                <label>Name</label>
                <input type="text" name="StudioName"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
<!--            band leader name-->
            <div class="input-box">
                <label>Band leader name</label>
                <input type="text" name="lederName"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
            <!--                email-->
            <div class="input-box">
                <label>Email</label>
                <input type="text" name="StudioName"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
<!--            nic-->
            <div class="input-box">
                <label>NIC</label>
                <input type="number" name="NIC"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
<!--            telephone number-->
            <div class="input-box">
                <label>Telephone Number</label>
                <input type="number" name="StudioName"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
<!--            member count-->
            <div class="input-box">
                <label>Member count</label>
                <input type="number" name="memberCount"
                       class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['title']; ?>">
            </div>
<!--            rate-->
            <div class="input-box">
                <label>Rate</label>
                <input type="number"></input>
            </div>
            <div class="input-box">
                <label>Description</label>
                <textarea name="" id="" cols="20" rows="10"></textarea>
            </div>
            <!--            video link-->
            <div class="input-box">
                <label>Video <br> (Add Embeded link)</label>
                <input type="text" name="business_name"
                       class="<?php echo (!empty($data['business_name_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['']; ?>">
            </div>
            <!--            location-->
            <div class="input-box">
                <label>Location</label>
                <div class="dropdown">
                    <div class="select-box" onclick="toggleOptions('location')">
                        Select location
                        <div class="arrow"></div>
                    </div>
                    <div class="options optionsLocation">

                    </div>
                </div>
            </div>
            <!--            instrument selection-->
            <div class="input-box">
                <label>Can you play an instrument?</label>
                <select id="selection" onchange="showInstruments()">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>
            </div>
            <!--            instrument-->
            <div class="input-box hidden" id="hidden">
                <label>Select the instruments you can play:</label>
                <div class="dropdown">
                    <div class="select-box" onclick="toggleOptions('instrument')">
                        Select instruments
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
            <!--            leader image-->
            <div class="photo_container">
                <div class="input-box">
                    <label style="font-weight: bold">Leader photo</label>
                </div>
                <div class="photo-table">
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1"
                                 onclick="triggerInput(1)">
                            <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1"
                                   class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['photo_1']; ?>"
                                   onchange="previewImage(this, 'previewPhoto_1')" required>
                        </div>
                    </div>
                </div>
            </div>
            <!--            band photo-->
            <div class="photo_container">
                <div class="input-box">
                    <label style="font-weight: bold">Band photo</label>
                </div>
                <div class="photo-table">
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1"
                                 onclick="triggerInput(1)">
                            <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1"
                                   class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['photo_1']; ?>"
                                   onchange="previewImage(this, 'previewPhoto_1')" required>
                        </div>
                    </div>
                </div>
            </div>
            <!--            work photo-->
            <div class="photo_container">
                <div class="input-box">
                    <label style="font-weight: bold">Work photos(optional)</label>
                </div>
                <div class="photo-table">
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1"
                                 onclick="triggerInput(1)">
                            <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1"
                                   class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['photo_1']; ?>"
                                   onchange="previewImage(this, 'previewPhoto_1')" required>
                        </div>
                    </div>
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2"
                                 onclick="triggerInput(2)">
                            <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2"
                                   class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['photo_2']; ?>"
                                   onchange="previewImage(this, 'previewPhoto_2')" required>
                        </div>
                    </div>
                    <div class="photo-outer">
                        <div class="photo-inner">
                            <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3"
                                 onclick="triggerInput(3)">
                            <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3"
                                   class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['photo_3']; ?>"
                                   onchange="previewImage(this, 'previewPhoto_3')" required>
                        </div>
                    </div>
                </div>
            </div>
            <button id="submitBtn">Submit</button>
        </form>
    </div>
</div>
<script>
    function showInstruments() {
        var selection = document.getElementById("selection");
        var instruments = document.getElementById("hidden");

        if (selection.value === "yes") {
            instruments.classList.remove("hidden");
        } else {
            instruments.classList.add("hidden");
        }
    }

    function toggleOptions(selection) {
        if (selection == 'location' ){
            var optionsContainer = document.querySelector('.optionsLocation');
            optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        }else{
            var optionsContainer = document.querySelector('.optionsInstrument');
            optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        }

    }

    var districts = ["Colombo", "Gampaha", "Kandy", "Jaffna", "Matara", "Nuwara Eliya", "Galle" , "Matara", "Hambanthota","Jaffna","Kilinochchi", "Mannar","Mullaitivu","Vavuniya","Batticola","Ampara","Trincomalee","Kurunegala","Puttalam","Anuradhapura","Polonnaruwa","Badulla","Monaragala","Ratnapura","Kegalle"];

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
</script>
</body>
</html>