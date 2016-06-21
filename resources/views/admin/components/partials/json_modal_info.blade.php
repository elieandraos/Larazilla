<div id="json-options-modal" class="modal"> 
	<div class="modal-content"> 
		<ul class="tabs"> 
			<li class="tab col s3"><a class="active" href="#content-dropdown">Dropdown</a></li>
			<li class="tab col s3"><a href="#content-checkbox">Checkbox</a></li>  
      <li class="tab col s3"><a href="#content-radio">Radio</a></li>  
			<li class="tab col s3"><a href="#content-image">Image</a></li>  
  		</ul> 

  		<div id="content-dropdown" class="col s12 json-info">
  			<code class="hidden">
            {
              "en": {
                "data": {
                  "-1": "Choose value",
                  "foo": "bar",
                  "john": "doe"
                },
                "defaultSelected": "-1"
              },
              "fr": {
                "data": {
                  "-1": "Choisir une valeur",
                  "lorem": "\"Elie\" est d'un",
                  "code": "zilla"
                },
                "defaultSelected": "-1"
              }
            }
  			</code>
  		</div>
  		<div id="content-checkbox" class="col s12 json-info">
  			<code class="hidden">
          {
            "en": {
              "data": [{
                "name": "en_awards",
                "label": "Season MVP",
                "value": "season_mvp",
                "id": "en_season_mvp",
                  "checked": 1
              }, {
                "name": "en_awards",
                "label": "Finals MVP",
                "value": "finals_mvp",
                "id": "en_finals_mvp"
              }]
            },
            "fr": {
              "data": [{
                "name": "fr_awards",
                "label": "Season MVP",
                "value": "season_mvp",
                "id": "fr_season_mvp",
                  "checked": 1
              }, {
                "name": "fr_awards",
                "label": "Finals MVP",
                "value": "finals_mvp",
                "id": "fr_finals_mvp"
              }]
            }
          }
			</code>
  </div>


<div id="content-radio" class="col s12 json-info">
  			<code class="hidden">
          {
            "en": {
              "data": [{
                "name": "en_is_active",
                "label": "Yes",
                "value": "yes",
                "id": "en_is_active_yes",
                "checked": 1
              }, {
                "name": "en_is_active",
                "label": "No",
                "value": "no",
                "id": "en_is_active_no"
              }]
            },
            "fr": {
              "data": [{
                "name": "fr_is_active",
                "label": "Oui",
                "value": "oui",
                "id": "fr_is_active_yes",
                "checked": 1
              }, {
                "name": "fr_is_active",
                "label": "Non",
                "value": "non",
                "id": "fr_is_active_no"
              }]
            }
          }
			</code>
</div>

<div id="content-dropdown" class="col s12 json-info">
  <code class="hidden">
      {
          "collection": "player"
      }
  </code>
</div>

	<div class="modal-footer"> 
		<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Dismiss</a> 
	</div> 
</div>