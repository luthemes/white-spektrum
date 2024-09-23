<?php

namespace WhiteSpektrum\Settings\Manager\Plugins;

class Plugin {

    protected $name;
    protected $label;
    protected $author;
    protected $description = '';

    public function __construct( $name, $data ) {

        $this->name        = $name;
        $this->label       = isset($data['label']) ? $data['label'] : '';
        $this->author      = isset( $data['author'] ) ? $data['author'] : '';
        $this->description = isset( $data['description']) ? $data['description'] : '';

    }

    public function name() {
        return $this->name;
    }

    public function label() {
        return $this->label;
    }

    public function downloadUrl() {
        return $this->download_url;
    }

    public function description() {
        return $this->description;
    }

    public function author() {
        return $this->author;
    }

    public function displayCard() { ?>
        <div class="plugin-card" aria-describedby="<?php echo esc_attr( sprintf( '%1$s-action %1$s-name', $this->name() ) ) ?>" data-slug="<?php echo esc_attr( $this->name() ) ?>">

            <div class="plugin-title" style="padding: 0 1rem">
                <h2 class="plugin-name" id="<?php echo esc_attr( sprintf( '%s-name', $this->name() ) ) ?>" style="margin-bottom: 0.25rem;">
                    <?php echo esc_html( $this->label() ) ?>
                </h2>
                <?php echo esc_html( wp_strip_all_tags( $this->author() ) ); ?>
            </div>

            <div class="plugin-description" style="padding: 1rem; margin-bottom: 1rem;">
                <p><?php echo esc_html( wp_strip_all_tags( $this->description() ) ); ?></p>
            </div>

        </div>
        <?php
    }
}
