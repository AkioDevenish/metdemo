tinymce.init({
    plugins: plugins + ' code',
    toolbar: toolbar + ' code',
    valid_elements: '*[*]',
    extended_valid_elements: 'script[src|language|type|charset]',
    protect: [
        /\<script[\s\S]*?\>/g,
        /\<\/script[\s\S]*?\>/g
    ],
    verify_html: false,
    cleanup: false,
    allow_script_urls: true,
    allow_html_in_named_anchor: true
}); 