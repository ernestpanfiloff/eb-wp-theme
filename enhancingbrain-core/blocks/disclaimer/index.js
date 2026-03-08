( function( blocks, element, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'enhancingbrain/disclaimer', {
		edit: function( props ) {
			var text = props.attributes.text || '';

			return el(
				'div',
				{ className: 'eb-disclaimer ebc-disclaimer' },
				el(
					'p',
					null,
					el( 'strong', null, __( 'Disclaimer:', 'enhancingbrain-core' ) + ' ' ),
					text
				)
			);
		},
		save: function() {
			return null;
		}
	} );
} )( window.wp.blocks, window.wp.element, window.wp.i18n );

