<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#inventory" aria-controls="inventory" role="tab" data-toggle="tab">Inventory</a></li>
    <li role="presentation" class="active"><a href="#steps" aria-controls="steps" role="tab" data-toggle="tab">Route Steps</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inventory"><?php echo $this->element('displayinventories');?></div>
    <div role="tabpanel" class="tab-pane active" id="distributions"><?php echo $this->element('displayroutesteps');?></div>
  </div>

</div>
