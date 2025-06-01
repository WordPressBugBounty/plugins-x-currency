<?php defined( 'ABSPATH' ) || exit; ?>
<div class="notice x-currency-notice" style="display: flex; align-items: flex-start; background: #f0f5ff; border-left: 4px solid #1f66ff; padding: 20px; border-radius: 4px; margin-top: 20px;">
    <img src="https://ps.w.org/x-currency/assets/icon-128x128.gif" alt="" style="width: 64px; height: 64px; flex-shrink: 0; margin-right: 16px;">
    <div style="flex: 1;">
        <div style="font-size: 16px; font-weight: 600; color: #1f66ff; margin-bottom: 8px;">
            🎉 Great News — Get X-Currency Pro for Free!
        </div>
        <div style="font-size: 14px; color: #595959; line-height: 1.6;">
            We’re offering <strong>X-Currency Pro</strong> completely free to our Facebook community members. You’ll get access to the latest Pro updates and exclusive features. Stay connected and don’t miss out!
        </div>
        <div style="margin-top: 16px;">
            <button class="button maybe-later" style="margin-right: 10px;">Maybe Later</button>
            <a class="button button-primary" href="https://www.facebook.com/groups/doatkolom" target="_blank" rel="noopener noreferrer">
                Join Our Facebook Community
            </a>
        </div>
    </div>
</div>

<script data-cfasync="false" type="text/javascript">
    jQuery(function ($) {
        $('.x-currency-notice .maybe-later').on('click', function (event) {
            event.preventDefault();
            let button = $(this);
            button.attr('disabled', true);
            $.ajax({
                url: "<?php echo esc_url( get_rest_url( null, '/x-currency/admin/notice_maybe_latter' ) ); ?>",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', "<?php x_currency_render( wp_create_nonce( 'wp_rest' ) ); ?>");
                },
                success: function () {
                    let $notice = button.closest('.notice');
                    $notice.fadeTo(100, 0, function () {
                        $notice.slideUp(100, function () {
                            $notice.remove();
                        });
                    });
                }
            });
        });
    });
</script>
