<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $date = now()->modify('-'. random_int(1, 300) .' seconds');
        return [
            'created_at' => $date,
            'updated_at' => $date,
            'title' => 'Testowy artykuł '. random_int(1, 999),
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel libero at metus fringilla vehicula sollicitudin et ipsum. Suspendisse nec blandit erat. Nulla rutrum leo ipsum, eu fermentum tellus vulputate a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat nisi, pellentesque faucibus enim ut, tempus posuere urna. Vivamus interdum lobortis velit, at luctus quam ultricies ac. Curabitur condimentum auctor iaculis. Sed in cursus dui. In condimentum tellus sed ultricies feugiat. Ut pulvinar convallis sem, sed vestibulum leo hendrerit suscipit. Vestibulum sit amet lacus et mi ullamcorper ullamcorper egestas ut libero. Sed non ex volutpat, congue mauris pulvinar, lacinia dui. In dignissim, nulla eget tincidunt egestas, libero felis commodo risus, at lobortis velit dui at massa. Aenean eget ligula vehicula purus vestibulum commodo. Nunc aliquam rutrum malesuada. Suspendisse ullamcorper leo eget scelerisque laoreet.',
        ];
    }
}
