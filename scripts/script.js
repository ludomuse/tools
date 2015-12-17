$(function(){
  
  var Objects = [];
  
  $('.ObjectJson-Json').each(function(){
    
    var objectName = $(this).data('name');
    
    var Json = $(this).text();
    Objects.push(JSON.parse(Json));
    
  });
  
  
  function generateJson() {
    var Return = {};
    Return.app = {};
    
    var App = Return.app;
    App.colors = [];
    App.images = [];
    App.sounds = [];
    
    App.screens = [];
    
    var Screen = {};
    Screen.id = "";
    
    Screen.navigation = {};
    Screen.navigation.template = "";
    Screen.navigation.entities = [];  
    Screen.navigation.entities = getEntitiesJson('Navigation');
    
    Screen.information = {};
    Screen.information.template = "";
    Screen.information.entities = [];
    Screen.information.entities = getEntitiesJson('Information');
    
    Screen.content = {};
    Screen.content.template = "";
    Screen.content.entities = [];
    Screen.content.entities = getEntitiesJson('Content');
    
    App.screens.push(Screen);
    
    
    $('#Return').html(JSON.stringify(Screen,null,2));
  }
  
  $('.JS-AddEntitySelect').on('change',function(){
    addEntity($(this).val(), $(this).data('to'));
    $(this).find('option:first').attr('selected','selected');
  });
  
  $('.JS-AddEntity').on('click',function(){
    addEntity($(this).data('entity-name'), $(this).data('to'));
  });
  
  $('.JS-EditEntity').on('click',function(){
    $(this).parents('.ObjectJson').find('.ObjectJson-Json').toggleClass('show');
  });
  
  $('.JS-RemoveEntity').on('click',function(){
    $(this).parents('.ObjectJson').remove();
  });
  
  $('#Generate').on('click',function(){
    generateJson();
  });
  
  function addEntity(name, to) {
    $('#ObjectsJson .ObjectJson[data-name="'+name+'"]').clone(true).appendTo(to);
  }  
  
  function getEntitiesJson(level) {
    var ReturnEntities = [];
    
    $('#'+level+'-entities .ObjectJson-Json').each(function(){
      ReturnEntities.push(JSON.parse($(this).text()));
    });
    
    return ReturnEntities;
  }
});