<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ludomuse • Génération de structure pour écran Ludomuse</title>
  
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="scripts/script.js"></script>
  
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,500' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="styles/css.css">
</head>
<body>
  
  <div id="ObjectsJson">
  <?php
    $dir = './objects/';
      
    $Objects = array();
    
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != '..' && $file != '.') {
            $name = explode('.',$file);
            $name = $name[1];
          ?>
          
            <div class="ObjectJson" data-name="<?php echo $name; ?>">
              <div class="ObjectJson-Item">
                <h6 class="ObjectJson-Title"><?php echo $name; ?></h6>
                
                <div class="ObjectJson-Details">
                  <div class="JS-EditEntity">Modifier le JSON</div>
                  <div class="JS-RemoveEntity">X</div>
                </div>
              </div>
              <div class="ObjectJson-Json" contenteditable="true"><?php echo file_get_contents($dir.'/'.$file); ?></div>
            </div>
          
          <?php
          }
        }
        closedir($dh);
      }
    }
  ?>
  </div>
  
  <div id="Return" contenteditable="true"></div>
  
  <div id="Edit">
  
    <h3 id="PageTitle">Génération de structure pour écran Ludomuse</h3>
    <!--
    <div id="Section-App" class="Section">
      <div id="Subsection-Colors" class="Subsection">
        Colors
      </div>
      
      <div id="Subsection-Images" class="Subsection">
        Images
      </div>
      
      <div id="Subsection-Sounds" class="Subsection">
        Sounds
      </div>
    </div>
    -->
    <div id="Section-Screens" class="Section">
      <div id="Subsection-Navigation" class="Subsection">
        
        <select class="JS-AddEntitySelect" data-to="#Navigation-entities">
          <option>Ajouter un objet…</option>
          <option value="Nav">Nav</option>
        </select>
        
        <h3 class="Subsection-Title">Navigation</h3>
        
        <!--<input type="text" placeholder="Nom du template (laisser vide sinon)" class="Input-Template" data-id="Navigation-template">-->
        
        <div id="Navigation-entities" class="Placeholder-entities"></div>
      </div>
      
      <div id="Subsection-Information" class="Subsection">
        <select class="JS-AddEntitySelect" data-to="#Information-entities">
          <option>Ajouter un objet…</option>
          <option value="Info">Info</option>
        </select>
        
        <h3 class="Subsection-Title">Information</h3>
        
        <div id="Information-entities" class="Placeholder-entities"></div>
      </div>
      
      <div id="Subsection-Content" class="Subsection">
        <select class="JS-AddEntitySelect" data-to="#Content-entities">
          <option>Ajouter un objet…</option>
          <option value="Text">Text</option>
          <option value="Image">Image</option>
          <option value="Sound">Sound</option>
          <option value="Video">Video</option>
          <option value="Reward">Reward</option>
          <option value="Grid">Grid</option>
        </select>
        
        <h3 class="Subsection-Title">Content</h3>       
        
        <div id="Content-entities" class="Placeholder-entities"></div>
      </div>
    </div>
    
    <div id="Generate">Générer le JSON de cet écran</div>
  </div>
  
  
  
</body>
</html>