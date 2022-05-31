<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Influencer;
use App\Models\Instagram;
use App\Models\Post;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use Illuminate\Http\Request;
use App\Library\WebClientCustom;
use DOMDocument;
use Exception;
use Illuminate\Support\Facades\File;
use function Ramsey\Uuid\v1;
use DomXPath;

class CrawlerController extends Controller
{



    public function crawl()
    {
        $dom = new DOMDocument('1.0');
        $url = 'http://www.parsia-optic.com/sitemap.xml';
        @$dom->loadHTMLFile($url);
        $paths = @$dom->getElementsByTagName('loc');
        foreach ($paths as $row) {
          
            if (str_contains($row->nodeValue, '/Product/')) {
                $url2 = $row->nodeValue;
                @$dom->loadHTMLFile($url2);
                $finder = new DomXPath($dom);
                foreach (@$dom->getElementsByTagName('meta') as $item) {
                    if (@$item->attributes[0]->nodeValue === "description") {
                        $description_seo = @$item->attributes[1]->nodeValue;
                      

                    }
                }
                @$price = $finder->query("//*[contains(@class,'gheymat')]")[0]->nodeValue;
                if (@$dom->getElementById('slider')->childNodes[1]->attributes[0]->nodeValue) {
                    try {
                        $x = file_get_contents($dom->getElementById('slider')->childNodes[1]->attributes[0]->nodeValue);
                        $fileName = md5(microtime()) . ".jpeg";
                        file_put_contents('assets/uploads/content/pro/' . $fileName, $x);
                    } catch (Exception $e) {
                        \Log::info('عکس اپلود نشد');
                    }
                } else {
                    $fileName = null;
                }
                $product = Product::create([
                    'title' => $dom->getElementsByTagName('h1')[1]->nodeValue,
                    'title_seo' => $dom->getElementsByTagName('title')[0]->nodeValue,
                    'description_seo' => $description_seo,
                    'price' => str_replace(',', '', str_replace('تومان', '', $price)),
                    'url' => explode('/', $row->nodeValue)[5],
                    'old_id' => explode('/', $row->nodeValue)[4],
                    'status'=>1


                ]);
                $childs = @$dom->getElementById(str_replace('#', '', @$dom->getElementById('slider')->childNodes[1]->attributes[1]->nodeValue))->childNodes;
                foreach ($childs as $child) {
                    if ($child->nodeName == 'ul') {
                        foreach ($child->childNodes as $li) {
                            $specification_type = ProductSpecificationType::where('parent_id', null)->where('title', explode(':', @$li->nodeValue)[0])->first();
                          
                            if (!$specification_type || $li->nodeName != "#text") {
                                $specification_type = ProductSpecificationType::create([
                                    'title' => explode(':', @$li->nodeValue)[0],
                                ]);
                            }
                            $specification_value = ProductSpecificationType::where('parent_id', $specification_type->id)->where('title', explode(':', @$li->nodeValue)[1])->first();
                            if (!$specification_value || $li->nodeName != "#text") {
                                $specification_value = ProductSpecificationType::create([
                                    'title' => explode(':', @$li->nodeValue)[1],
                                    'parent_id' => $specification_type->id
                                ]);
                            }
                            if ($specification_type && $specification_value) {
                                $product_specification = ProductSpecification::create([
                                    'product_id' => $product->id,
                                    'product_specification_type_id' => $specification_type->id,
                                    'product_specification_value_id' => $specification_value->id,
                                ]);
                            }
                        }

                    }
                }

                if (intval(@$price) > 0) {
                    $x = Price::create([
                        'priceable_type' => 'App\Models\Product',
                        'priceable_id' => $product->id,
                        'price' => $product->price
                    ]);
                }
//                dd(explode('/',$row->nodeValue)[5]);


            };

        }
    }


}
