<?php
/**
 * Register custom REST API routes.
 */
add_action( 'rest_api_init', function () {
	// Register routes
	register_rest_route( 'crafted/v1', '/subscribe', array(
		'methods'  => 'POST',
		'callback' => 'rest_subscribe_to_mailchimp'
	) );
});

/**
 * Respond to a REST API request to get post data.
 *
 * @param WP_REST_Request $request
 * @return WP_REST_Response
 */
function rest_subscribe_to_mailchimp(WP_REST_Request $request)
{   

    $params     = $request->get_json_params($request);

    $email      = isset($params['email']) ? $params['email'] : '';
    $FNAME      = isset($params['FNAME']) ? $params['FNAME'] : '';
    $LNAME      = isset($params['LNAME']) ? $params['LNAME'] : '';
    $list_id    = isset($params['list_id']) ? $params['list_id'] : '';

    // return $params;
    $username = 'kenlstark';
    $password = '3d668baf6bde5a76c3510507386b29db-us20';
    $url = "https://us20.api.mailchimp.com/3.0/lists/$list_id/members";
    
    $body = array( 'email_address' => $email, 'status' => 'subscribed', 'merged_fields' => array('FNAME' => $FNAME, 'LNAME' => $LNAME) );

    $response = wp_remote_post( $url, array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array('Authorization' => 'Basic ' . base64_encode( $username . ':' . $password ), 'Content-Type' => 'application/json; charset=utf-8',),
        'body' => json_encode($body),
        'cookies' => array()
        )
    );
    
    if ( is_wp_error( $response ) ) {
       $error_message = $response->get_error_message();
       return "Something went wrong: $error_message";
    } else {
       return $response;
    }
    
    
}