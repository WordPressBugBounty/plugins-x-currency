<?php

namespace XCurrency\App\DTO;

defined( 'ABSPATH' ) || exit;

class SwitcherDTO
{
    private int $id;

    private string $title;

    private string $type;

    private bool $active_status = false;

    private string $custom_css = '';

    private string $customizer_id;

    private string $template;

    private string $content;

    private string $package;

    private string $page = 'all';

    /**
     * Get the value of id
     *
     * @return int
     */
    public function get_id(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id 
     *
     * @return self
     */
    public function set_id( int $id ): self {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function get_title(): string {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title 
     *
     * @return self
     */
    public function set_title( string $title ): self {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function get_type(): string {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type 
     *
     * @return self
     */
    public function set_type( string $type ): self {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of active_status
     *
     * @return bool
     */
    public function is_active_status(): bool {
        return $this->active_status;
    }

    /**
     * Set the value of active_status
     *
     * @param bool $active_status 
     *
     * @return self
     */
    public function set_active_status( bool $active_status ): self {
        $this->active_status = $active_status;

        return $this;
    }

    /**
     * Get the value of custom_css
     *
     * @return string
     */
    public function get_custom_css(): string {
        return $this->custom_css;
    }

    /**
     * Set the value of custom_css
     *
     * @param string $custom_css 
     *
     * @return self
     */
    public function set_custom_css( string $custom_css ): self {
        $this->custom_css = $custom_css;

        return $this;
    }

    /**
     * Get the value of customizer_id
     *
     * @return string
     */
    public function get_customizer_id(): string {
        return $this->customizer_id;
    }

    /**
     * Set the value of customizer_id
     *
     * @param string $customizer_id 
     *
     * @return self
     */
    public function set_customizer_id( string $customizer_id ): self {
        $this->customizer_id = $customizer_id;

        return $this;
    }

    /**
     * Get the value of template
     *
     * @return string
     */
    public function get_template(): string {
        return $this->template;
    }

    /**
     * Set the value of template
     *
     * @param string $template 
     *
     * @return self
     */
    public function set_template( string $template ): self {
        $this->template = $template;

        return $this;
    }

    /**
     * Get the value of content
     *
     * @return string
     */
    public function get_content(): string {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content 
     *
     * @return self
     */
    public function set_content( string $content ): self {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of package
     *
     * @return string
     */
    public function get_package(): string {
        return $this->package;
    }

    /**
     * Set the value of package
     *
     * @param string $package 
     *
     * @return self
     */
    public function set_package( string $package ): self {
        $this->package = $package;

        return $this;
    }

    /**
     * Get the value of page
     *
     * @return string
     */
    public function get_page(): string {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @param string $page 
     *
     * @return self
     */
    public function set_page( string $page ): self {
        $this->page = $page;

        return $this;
    }
}
