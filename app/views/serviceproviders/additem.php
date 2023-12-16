<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-additem.css"/>
<body>
<!-------------register-form----------->
<div class="register">
    <div class="container">
        <p>Add Item</p>
            <form action="<?php echo URLROOT; ?>/serviceproviders/additem" class="form" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <label>Title</label>
                    <input type="text" name="title" class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                </div>
<!--                category-->
                <div class="input-box">
                    <label>Category</label>
                    <div class="custom-select">
                        <select id="categorySelect" onchange="updateBrandOptions()" name="category">
                            <option value="Electric_Guitars">Electric Guitars</option>
                            <option value="Acoustic_Guitars">Acoustic Guitars</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Band_And_Orchestra">Band and Orchestra</option>
                            <option value="Audio">Audio</option>
                            <option value="Percussion">Drums and Percussion</option>
                        </select>
                    </div>
                </div>
<!--              brand and orchestra-->
                <div class="band" id="band">
                    <div class="input-box">
                        <label>Band and Orchestra</label>
                        <div class="custom-select">
                            <select id="bandOrchestraCategories" onchange="updateBrandOptions()" name="bandOrchestra">
                                <option value="Woodwind">Woodwind</option>
                                <option value="Brass">Brass</option>
                                <option value="String">String</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--                woodwind-->
                <div class="woodwing" id="woodwing">
                    <div class="input-box">
                        <label>Woodwind Category</label>
                        <div class="custom-select">
                            <select id="WoodwindCategories" onchange="" name="Woodwind">
                                <option value="Flutes">Flutes</option>
                                <option value="Saxophones">Saxophones</option>
                                <option value="Clarinets">Clarinets</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--                brass-->
                <div class="brass" id="brass">
                    <div class="input-box">
                        <label>Brass category</label>
                        <div class="custom-select">
                            <select id="brassCategories" onchange="updateSubBrandOptions()" name="brass">
                                <option value="Trumphet">Trumphets</option>
                                <option value="Trombones">Trombones</option>
                                <option value="FrenchHorns">French Hornes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--                string-->
                <div class="string" id="string">
                    <div class="input-box">
                        <label>String category</label>
                        <div class="custom-select">
                            <select id="stringCategories" onchange="updateSubBrandOptions()" name="string">
                                <option value="Violins">Violins</option>
                                <option value="Cellos">Cellos</option>
                                <option value="Violas">violas</option>
                            </select>
                        </div>
                    </div>
                </div>
<!--                keyboard-->
                <div class="Keyboard" id="Keyboard">
                    <div class="input-box">
                        <label>Keyboard category</label>
                        <div class="custom-select">
                            <select id="keyboardCategories" onchange="updateSubBrandOptions()" name="keyboard">
                                <option value="Piano">Piano</option>
                                <option value="Organs">Organs</option>
                            </select>
                        </div>
                    </div>
                </div>
<!--                drums and percussion -->
                <div class="Percussion" id="Percussion">
                    <div class="input-box">
                        <label>Drums and Percussion Category</label>
                        <div class="custom-select">
                            <select id="drumsCategories" onchange="updateSubBrandOptions()" name="Percussion">
                                <option value="Cymbals">Cymbals</option>
                                <option value="Drums">Drums</option>
                            </select>
                        </div>
                    </div>
                </div>
<!--                Audio-->
                <div class="Audio" id="Audio">
                    <div class="input-box">
                        <label>Audio</label>
                        <div class="custom-select">
                            <select id="homeAudioCategory" onchange="updateSubBrandOptions()" name="sounds">
                                <option value="Headphones">Headphones</option>
                                <option value="Receivers">Receivers</option>
                                <option value="Amplifiers">Amplifiers</option>
                                <option value="Speakers">Speakers</option>
                                <option value="Subwoofers">Subwoofers</option>
                                <option value="Tape_Decks">Tape Decks</option>
                                <option value="Turntables">Turntables</option>
                                <option value="Microphones">Microphones</option>
                                <option value="Mixers">Mixers</option>
                                <option value="Recording">Recording</option>
                            </select>
                        </div>
                    </div>
                </div>
<!--                brand-->
                <div class="input-box">
                    <label>Brand</label>
                    <div class="custom-select">
                        <select id="brandSelect" name="brand">
                        </select>
                    </div>
                </div>
<!--                ..... availability / out of stock.....-->
                <div class="input-box">
                    <label>Availability</label>
                    <select name="availabilty" id="availability`+item.product_id+`">
                        <option value="0">Available</option>
                        <option value="1">Unavailable</option>
                    </select>
                </div>
<!--                Model-->
                <div class="input-box">
                    <label>Model</label>
                    <input type="text" required name="model" class="<?php echo (!empty($data['model_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['model']; ?>">
                </div>
                <!--                quantity-->
                <div class="input-box">
                    <label>Quantity</label>
                    <input type="number" required name="quantity" class="<?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity']; ?>">
                </div>
                <!--                Unit price-->
                <div class="input-box">
                    <label>Unit Price (Lkr)</label>
                    <input type="number" required name="unit_price" class="<?php echo (!empty($data['unit_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['unit_price']; ?>">
                </div>
<!--                warranty date-->
                <div class="input-box">
                    <label>Warranty date</label>
                    <input type="date" required name="warranty" class="<?php echo (!empty($data['warranty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['warranty']; ?>">
                </div>
<!--                description-->
                <div class="description">
                    <div class="input-box">
                        <label>Description</label>
                    </div>
                    <div class="textArea">
                        <textarea id="description" name="description" rows="4" required style="width: 290px;height: 150px"></textarea>
                    </div>
                </div>
<!--                photos-->
                <div class="photo_container">
                    <div class="input-box">
                        <label style="font-weight: bold">Add up to 3 photos (Must be 3 photos)</label>
                    </div>
                    <div class="photo-table">
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1" onclick="triggerInput(1)">
                                <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_1']; ?>" onchange="previewImage(this, 'previewPhoto_1')" required>
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2" onclick="triggerInput(2)">
                                <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_2']; ?>" onchange="previewImage(this, 'previewPhoto_2')" required>
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3" onclick="triggerInput(3)">
                                <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_3']; ?>" onchange="previewImage(this, 'previewPhoto_3')" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="submitBtn">Submit</button>
            </form>
    </div>
</div>
<script src="<?php echo URLROOT;?>/js/sp-additem.js"></script>
</body>
</html>