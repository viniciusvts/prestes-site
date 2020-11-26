<div class="location-container" id="locationSidebar">
  <div class="location-middle">
    <div class="location-content">
      <span class="location-state">Selecione:</span>
      <ul class="nav-location" id="locList">
          <?php
          $terms = get_terms( array(
              'taxonomy' => 'cidade',
              'orderby' => 'name',
              'hide_empty' => true,
          ) );
          foreach ($terms as $term) {
          ?>
          <li class="nav-item">
            <a href="#development"><?php echo($term->name); ?></a>
          </li>
          <?php
          }
          ?>
      </ul>
    </div>
  </div>

  <button class="location-close" id="closeLocSidebar">X</button>
</div>