<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use Elementor\Group_Control_Typography;

class Elementor_Custom_Carousel_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'custom_carousel';
    }

    public function get_title() {
        return __( 'Custom Carousel', 'elementor-custom-carousel' );
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'elementor-custom-carousel' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'product_title',
            [
                'label' => __( 'Product Title', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Product Title', 'elementor-custom-carousel' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'product_price',
            [
                'label' => __( 'Product Price', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '$99.99', 'elementor-custom-carousel' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'product_image',
            [
                'label' => __( 'Product Image', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'product_link',
            [
                'label' => __( 'Product Link', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'elementor-custom-carousel' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'carousel_items',
            [
                'label' => __( 'Carousel Items', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'product_title' => __( 'Sample Product 1', 'elementor-custom-carousel' ),
                        'product_price' => __( '$99.99', 'elementor-custom-carousel' ),
                    ],
                    [
                        'product_title' => __( 'Sample Product 2', 'elementor-custom-carousel' ),
                        'product_price' => __( '$149.99', 'elementor-custom-carousel' ),
                    ],
                ],
                'title_field' => '{{{ product_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => __( 'Slider Settings', 'elementor-custom-carousel' ),
            ]
        );

        $this->add_control(
            'carousel_autoplay',
            [
                'label' => __( 'Autoplay', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementor-custom-carousel' ),
                'label_off' => __( 'No', 'elementor-custom-carousel' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'carousel_loop',
            [
                'label' => __( 'Loop', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementor-custom-carousel' ),
                'label_off' => __( 'No', 'elementor-custom-carousel' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_delay',
            [
                'label' => __( 'Autoplay Delay (ms)', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'min' => 1000,
                'step' => 100,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'elementor-custom-carousel' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Image Height', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide img' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'space_between_slides',
            [
                'label' => __( 'Space Between Slides', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title Style', 'elementor-custom-carousel' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Title Margin', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __( 'Title Padding', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'elementor-custom-carousel' ),
                'selector' => '{{WRAPPER}} .swiper-slide h3',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_style',
            [
                'label' => __( 'Price Style', 'elementor-custom-carousel' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price Color', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_margin',
            [
                'label' => __( 'Price Margin', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_padding',
            [
                'label' => __( 'Price Padding', 'elementor-custom-carousel' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __( 'Price Typography', 'elementor-custom-carousel' ),
                'selector' => '{{WRAPPER}} .swiper-slide p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['carousel_items'] ) ) {
            ?>
            <div class="custom-carousel swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['carousel_items'] as $item ) : ?>
                        <div class="swiper-slide carousel-item">
                            <?php if ( ! empty( $item['product_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $item['product_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['product_title'] ); ?>" />
                            <?php endif; ?>
                            <h3><?php echo esc_html( $item['product_title'] ); ?></h3>
                            <p><?php echo esc_html( $item['product_price'] ); ?></p>
                            <?php if ( ! empty( $item['product_link']['url'] ) ) : ?>
                                <a href="<?php echo esc_url( $item['product_link']['url'] ); ?>" target="<?php echo esc_attr( $item['product_link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['product_link']['nofollow'] ? 'nofollow' : '' ); ?>">View Product</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> 
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var swiper = new Swiper('.custom-carousel', {
                        slidesPerView: 'auto',
                        spaceBetween: <?php echo esc_js( $settings['space_between_slides']['size'] ); ?>,
                        autoplay: <?php echo $settings['carousel_autoplay'] === 'yes' ? 'true' : 'false'; ?>,
                        loop: <?php echo $settings['carousel_loop'] === 'yes' ? 'true' : 'false'; ?>,
                        autoplay: {
                            delay: <?php echo esc_js( $settings['autoplay_delay'] ); ?>,
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                });
            </script>
            <?php
        }
    }

    protected function _content_template() {
        ?>
        <#
        if ( settings.carousel_items.length ) {
            #>
            <div class="custom-carousel swiper-container">
                <div class="swiper-wrapper">
                    <# _.each( settings.carousel_items, function( item ) { #>
                        <div class="swiper-slide carousel-item">
                            <# if ( item.product_image.url ) { #>
                                <img src="{{ item.product_image.url }}" alt="{{ item.product_title }}" style="height: {{ settings.image_height.size }}{{ settings.image_height.unit }}; width: auto;">
                            <# } #>
                            <h3 style="color: {{ settings.title_color }}; margin: {{ settings.title_margin.top }}{{ settings.title_margin.unit }} {{ settings.title_margin.right }}{{ settings.title_margin.unit }} {{ settings.title_margin.bottom }}{{ settings.title_margin.unit }} {{ settings.title_margin.left }}{{ settings.title_margin.unit }}; padding: {{ settings.title_padding.top }}{{ settings.title_padding.unit }} {{ settings.title_padding.right }}{{ settings.title_padding.unit }} {{ settings.title_padding.bottom }}{{ settings.title_padding.unit }} {{ settings.title_padding.left }}{{ settings.title_padding.unit }}; typography: {{ settings.title_typography }};">{{{ item.product_title }}}</h3>
                            <p style="color: {{ settings.price_color }}; margin: {{ settings.price_margin.top }}{{ settings.price_margin.unit }} {{ settings.price_margin.right }}{{ settings.price_margin.unit }} {{ settings.price_margin.bottom }}{{ settings.price_margin.unit }} {{ settings.price_margin.left }}{{ settings.price_margin.unit }}; padding: {{ settings.price_padding.top }}{{ settings.price_padding.unit }} {{ settings.price_padding.right }}{{ settings.price_padding.unit }} {{ settings.price_padding.bottom }}{{ settings.price_padding.unit }} {{ settings.price_padding.left }}{{ settings.price_padding.unit }}; typography: {{ settings.price_typography }};">{{{ item.product_price }}}</p>
                            <# if ( item.product_link.url ) { #>
                                <a href="{{ item.product_link.url }}" target="{{ item.product_link.is_external ? '_blank' : '_self' }}" rel="{{ item.product_link.nofollow ? 'nofollow' : '' }}">View Product</a>
                            <# } #>
                        </div>
                    <# }); #>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <# } #>
        <?php
    }
}
