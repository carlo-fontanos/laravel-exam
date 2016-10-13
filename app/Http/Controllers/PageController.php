<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class PageController extends Controller
{
    public function index() 
	{
        return view('index', [
			'title' => 'My App'
		]);
    }
	
	public function add(Request $request) 
	{
		if( $request->ajax() ) {
			$validation = Validator::make( $request->all(), [
				'name' 		=> 'required',
				'quantity' 	=> 'required',
				'price' 	=> 'required'
			]);
		}
		
		if ( $validation->fails() ) {
			return response()->json( array(
				'status'	=>	0,
				'errors'	=>	$validation->errors()->all()
			));
			
		} else {
			/* Inser data to public/product.json file */
			$product_data = array(
				'name'			=>	$request->name,
				'quantity'		=>	$request->quantity,
				'price'			=>	$request->price,
				'date'			=>	date("Y-m-d H:i:s", time()),
			);
			
			$json_file_path = base_path('public\product.json');
			$file = file_get_contents( $json_file_path );
			$data = json_decode( $file, true );
			$data["product"] = array_values( $data["product"] );
			array_push( $data["product"], $product_data );
			
			if( file_put_contents( $json_file_path, json_encode( $data ) ) ) {
				
				return response()->json( array(
					'status'	=>	1,
					'message'	=>	'Product successfully added'
				));
				
			} else {
				return response()->json( array(
					'status'	=>	0,
					'message'	=>	'Insert failed, please try again'
				));
			}
			
		}
    }
	
	public function show( Request $request ) {
		
		if( $request->ajax() ) {
			$json_file_path = base_path('public\product.json');
			$json_data = json_decode( file_get_contents( $json_file_path ) );
			$products_html = '';
			
			$products_html .= '
			<table class="table table-responsive">
				<tr>
					<th>Product name</th>
					<th>Quantity in stock</th>
					<th>Price per item</th>
					<th>Datetime submitted</th>
					<th>Total value number</th>
				</tr>';
				
			
		
			if( $json_data ){
				foreach( $json_data->product as $key => $product ){
					$products_html .= '
					<tr>
						<td>' . $product->name . '</td>
						<td>' . $product->quantity . '</td>
						<td>' . $product->price . '</td>
						<td>' . $product->date . '</td>
						<td>' . $product->quantity * $product->price . '</td>
					</tr>';
				}
			}
			
			$products_html .= '</table>';
				
			return response()->json( array(
				'status'	=>	1,
				'message'	=>	nl2br( str_replace(array("\r", "\t", "\n"), "", $products_html ) )
			));
		}
	}
	
}
