/**
 * Enhancing Brain — Block Editor Inline Format
 * Adds an "EB Highlight" button to the rich text toolbar.
 * Wraps selected text in <mark class="eb-hi"> for green italic accent.
 */
( function() {
	var el        = wp.element.createElement;
	var Fragment  = wp.element.Fragment;
	var richText  = wp.richText;
	var components = wp.components;

	richText.registerFormatType( 'enhancingbrain/highlight', {
		title:     'EB Highlight',
		tagName:   'mark',
		className: 'eb-hi',
		edit: function( props ) {
			return el(
				Fragment,
				{},
				el(
					wp.blockEditor.RichTextToolbarButton,
					{
						icon: el(
							'svg',
							{ viewBox: '0 0 24 24', width: 20, height: 20, fill: 'none', stroke: '#0bbf96', strokeWidth: 2, strokeLinecap: 'round', strokeLinejoin: 'round' },
							el( 'path', { d: 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z' } )
						),
						title:       'EB Highlight (green italic accent)',
						isActive:    props.isActive,
						onClick: function() {
							props.onChange(
								props.isActive
									? richText.removeFormat( props.value, 'enhancingbrain/highlight' )
									: richText.applyFormat( props.value, { type: 'enhancingbrain/highlight' } )
							);
						},
					}
				)
			);
		},
	} );
} )();
