<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\DetailProducts;
use App\Models\DescriptionPoints;
class DetailProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan picture ini ada di database

        // Pastikan picture ditemukan
        if ($user) {
            $detproduct = [
                [
                    'title' => 'Crossflow Turbine',
                    'slug' => 'crossflow-turbine',
                    'home_slug' => 'crossflow-turbine',
                    'video' => 'mp4/crossflowturbine-wm.mp4',
                    'image1' => 'img/product/crossflow-wm.png',
                    'image2' => 'img/product/crossflow-wm.png',
                    'description_points' => [
                    [
                        'title' => 'Versatile Design',
                        'desc' => ' Crossflow turbines are designed to accommodate a wide 
                        variety of water flow rates and heads, making them highly adaptable 
                        to different site conditions. This versatility allows them to be used 
                        in both high and low-head installations, making them an ideal choice for 
                        diverse hydroelectric projects, from small-scale community setups to larger, 
                        more industrial applications.'
                    ],
                    [
                        'title' => 'Efficiency at Low Heads',
                        'desc' => ' One of the standout features of crossflow
                        turbines is their exceptional efficiency in low-head applications. 
                        Unlike some other turbine types that require high water pressure to 
                        operate effectively, crossflow turbines can generate significant power 
                        even when the water head is relatively low. This makes them especially 
                        useful in regions where water flow is available but with limited height 
                        differential.'
                    ],
                    [
                        'title' => 'Simple and Robust Construction',
                        'desc' => 'The crossflow turbines construction is relatively 
                        simple compared to other turbine designs, with fewer moving 
                        parts and a straightforward assembly. This simplicity translates 
                        to ease of maintenance, lower likelihood of mechanical failure, 
                        and reduced operational costs. The turbine consists of a drum-shaped 
                        runner with multiple blades, encased in a structure that guides 
                        the water flow, ensuring efficient energy capture.'
                    ],
                    [
                        'title' => 'Double Water Flow Path',
                        'desc' => 'A unique feature of the crossflow turbine is its 
                        ability to utilize a double water flow path. Water enters the
                         turbine and passes through the blades twice—first from the 
                         outside to the inside and then from the inside to the outside. 
                         This dual passage maximizes energy extraction from the water, 
                         significantly improving the turbines overall efficiency and making the most of the available water resource.'
                    ],
                    [
                        'title' => 'Cost-Effective Solution',
                        'desc' => 'Crossflow turbines are built 
                        to withstand challenging conditions, 
                        including water with high sediment content. 
                        The robust construction ensures that debris 
                        and other particulates do not easily damage 
                        the turbine, leading to a longer operational 
                        life and reliable performance over time. This 
                        durability is particularly important in remote 
                        or rugged environments where maintenance access 
                        may be limited.'
                    ],
                    [
                        'title' => 'Low Noise Operation',
                        'desc' => 'Another advantage of crossflow 
                        turbines is their quiet operation. The design 
                        minimizes noise production, making them suitable 
                        for installations in residential areas, eco-sensitive 
                        zones, or any location where noise pollution needs 
                        to be minimized. This low-noise characteristic is an 
                        added benefit for community acceptance and environmental 
                        compliance.'
                    ],
                    [
                        'title' => 'Adaptability to Varied Conditions',
                        'desc' => 'Crossflow turbines are highly adaptable to a 
                        wide range of environmental and geographical conditions. 
                        Whether the site is in a mountainous region with fast-moving 
                        streams or in a lowland area with gentle water flow, crossflow 
                        turbines can be customized to meet the specific requirements of 
                        the location. Their ability to function efficiently under varying 
                        conditions makes them a versatile choice for hydroelectric power 
                        generation worldwide.'
                    ],
                    [
                        'title' => 'Durability in Harsh Conditions',
                        'desc' => 'Crossflow turbines are built to withstand challenging conditions, including water with high sediment content. The robust construction ensures that debris and other particulates do not easily damage the turbine, leading to a longer operational life and reliable performance over time. This durability is particularly important in remote or rugged environments where maintenance access may be limited.'
                    ],
                ]
                ],
                [
                    'slug' => 'pelton-turbine',
                    'home_slug' => 'pelton-turbine',
                    'title' => 'Pelton Turbine',
                    'video' => 'mp4/peltonturbine-wm.mp4',
                    'image1' => 'img/product/peltonturbine-wm.png',
                    'image2' => 'img/product/peltonturbine-wm.png',
                    'description_points' => 
                    [[
                        'title' => 'Impulse Turbine',
                        'desc' => ' The Pelton turbine is an impulse-type water turbine, meaning it harnesses energy from water jets moving at high velocity. Unlike reaction turbines, which operate with water both pressurized and in motion, the Pelton turbine operates solely on the kinetic energy of water. This design makes it exceptionally well-suited for environments where water pressure is high but flow volume is low.'
                    ],
                    [
                        'title' => 'High Head Applications',
                        'desc' => ' Designed specifically for high-head applications, the Pelton turbine excels in situations where water falls from great heights. The turbine is commonly used in mountainous regions or areas with steep waterfalls, where the natural landscape provides the necessary conditions for generating significant amounts of energy. It is particularly effective in hydroelectric power plants where the height of the water source exceeds 150 meters (500 feet).'
                    ],
                    [
                        'title' => 'Innovative Bucket Design',
                        'desc' => 'A distinctive feature of the Pelton turbine is its spoon-shaped buckets, which are uniquely split down the middle. This design allows the water jet to hit the bucket and be divided into two streams, which then exit in opposite directions. By redirecting the water’s flow without causing significant turbulence, this design maximizes the energy transfer from the water to the turbine’s rotor, improving overall efficiency.'
                    ],
                    [
                        'title' => 'Efficient Energy Conversion',
                        'desc' => 'One of the key advantages of the Pelton turbine is its ability to convert nearly all of the kinetic energy from the water into mechanical energy. The high efficiency of this energy conversion process makes the Pelton turbine one of the most effective means of harnessing hydropower, with operational efficiencies often exceeding 90%. This efficiency translates directly into greater electricity generation from the same water source.'
                    ],
                    [
                        'title' => 'Robust and Durable Construction',
                        'desc' => 'Pelton turbines are renowned for their durability and robustness. Built to withstand the intense forces generated by high-velocity water jets, these turbines feature materials and construction techniques that ensure long service life even under demanding conditions. The durable nature of the Pelton turbine means that it can continue operating effectively for decades with minimal wear and tear.'
                    ],
                    [
                        'title' => 'Multi-Jet Capability for Variable Flow',
                        'desc' => 'The Pelton turbine can be configured with multiple nozzles, or jets, that direct water onto the turbine’s buckets. This multi-jet capability allows the turbine to handle variations in water flow more effectively. By adjusting the number of active jets, the turbine can maintain optimal performance across a range of operating conditions, ensuring reliable energy generation even when water availability fluctuates.'
                    ],
                    [
                        'title' => 'Compact and Space-Efficient Design',
                        'desc' => 'Despite its ability to generate large amounts of power, the Pelton turbine has a relatively compact design. This makes it an ideal choice for power plants that have space constraints, as it can be installed in smaller facilities without compromising on performance. The compact nature of the turbine also makes it easier to transport and install in remote or hard-to-reach locations.'
                    ],
                    [
                        'title' => 'Low Maintenance and Cost-Effective Operation',
                        'desc' => 'The Pelton turbine’s simple yet effective design results in low maintenance requirements. The turbine’s sturdy components are less prone to damage, reducing the frequency of repairs and downtime. This not only lowers operational costs but also increases the turbine’s overall reliability. As a result, the Pelton turbine is a cost-effective solution for long-term energy generation.'
                    ],
                ]
                ],
                [
                    'slug' => 'electronic-load-controller',
                    'home_slug' => 'electronic-load-controller',
                    'title' => 'Electronic Load Controller',
                    'video' => '',
                    'image1' => 'img/product/elc-wm.png',
                    'image2' => 'img/product/elc-wm.png',
                    'description_points' => 
                    [
                    [
                        'title' => 'Primary Function',
                        'desc' => ' The Electronic Load Controller is a critical component in micro-hydropower plants, designed to regulate the output frequency of a generator by managing excess electrical load. It ensures that the generator operates at a constant speed, thereby maintaining a stable frequency in the power system.'
                    ],
                    [
                        'title' => 'Load Management',
                        'desc' => ' ELCs control the distribution of electrical power by diverting surplus energy to dump loads (e.g., resistive heaters) when consumer demand is low. This prevents the generator from over-speeding, which could otherwise lead to damage or instability in the power supply.'
                    ],
                    [
                        'title' => 'Automatic Voltage Regulation',
                        'desc' => 'ELCs are often integrated with automatic voltage regulation (AVR) systems, which adjust the generators output voltage according to the load demand. This ensures consistent voltage levels across all connected devices, protecting them from voltage fluctuations.'
                    ],
                    [
                        'title' => 'Real-time Monitoring and Feedback',
                        'desc' => 'An advanced ELC continuously monitors generator parameters such as frequency, voltage, and current. It provides real-time feedback to adjust the load in microseconds, ensuring optimal performance and protection of the system.'
                    ],
                    [
                        'title' => 'Digital vs. Analog Control',
                        'desc' => ' Modern ELCs are predominantly digital, offering superior precision, programmability, and the ability to handle complex load scenarios compared to their analog counterparts. Digital ELCs can be customized for specific applications and are easier to integrate with other digital systems.'
                    ],
                    [
                        'title' => 'Safety Features',
                        'desc' => 'ELCs include various safety mechanisms, such as over-speed protection, over-voltage protection, and fault detection systems. These features are crucial for preventing damage to the generator and the entire electrical system in case of anomalies.'
                    ],
                    [
                        'title' => 'Energy Efficiency',
                        'desc' => 'By managing and diverting excess power efficiently, ELCs enhance the overall energy efficiency of micro-hydropower systems. This leads to reduced energy wastage and improved sustainability, making ELCs vital in renewable energy projects.'
                    ],
                    [
                        'title' => 'Remote Monitoring and Control',
                        'desc' => 'Some advanced ELCs come with remote monitoring and control capabilities. This allows operators to manage and troubleshoot the system from a distance, providing flexibility and reducing the need for on-site intervention, which is particularly useful in remote installations.'
                    ],
                ]
                ],
                [
                    'slug' => 'mechanical-electrical',
                    'home_slug' => 'mechanical-electrical',
                    'title' => 'Mechanical & Electrical',
                    'video' => '',
                    'image1' => 'img/source/product/mechanical/3.png',
                    'image2' => 'img/source/product/mechanical/3.png',
                    'description_points' => 
                    [
                    [
                        'title' => 'Integration of Mechanical and Electrical Systems',
                        'desc' => ' M&E systems are crucial in modern building designs, ensuring seamless integration between mechanical components like HVAC systems and electrical systems including lighting, power distribution, and fire alarms. Proper integration leads to enhanced energy efficiency, improved safety, and optimized operational performance.'
                    ],
                    [
                        'title' => 'HVAC (Heating, Ventilation, and Air Conditioning)',
                        'desc' => ' HVAC systems are a major component of the mechanical aspect of M&E. They regulate indoor environments by controlling temperature, humidity, and air quality. Advanced HVAC systems are designed to be energy-efficient, incorporating smart controls and automated adjustments based on real-time data.'
                    ],
                    [
                        'title' => 'Power Distribution and Electrical Infrastructure',
                        'desc' => 'Electrical systems in M&E cover power generation, distribution, and consumption management. This includes everything from transformers and switchgear to circuit breakers and wiring. An efficient electrical infrastructure ensures uninterrupted power supply, reduced energy losses, and compliance with safety standards.'
                    ],
                    [
                        'title' => 'Lighting Systems',
                        'desc' => 'Lighting is a critical part of the electrical component, where design and technology converge to provide adequate illumination, energy savings, and aesthetic appeal. Modern lighting systems utilize LED technology, automated controls, and daylight integration to reduce power consumption while enhancing user comfort.'
                    ],
                    [
                        'title' => 'Fire Safety and Protection Systems',
                        'desc' => ' M&E systems encompass fire detection, alarm systems, sprinklers, and emergency lighting. These systems are designed to detect and respond to fire hazards, ensuring early warning, effective suppression, and safe evacuation of occupants, thereby minimizing damage and loss of life.'
                    ],
                    [
                        'title' => 'Renewable Energy Integration',
                        'desc' => 'The integration of renewable energy sources like solar panels, wind turbines, and geothermal systems into M&E design is becoming increasingly common. This not only reduces the buildings carbon footprint but also enhances energy independence and contributes to long-term cost savings.'
                    ],
                    [
                        'title' => 'Building Automation and Smart Controls',
                        'desc' => 'Smart controls and building automation systems are essential in modern M&E design. These systems enable real-time monitoring, automatic adjustments, and remote control of mechanical and electrical systems, leading to optimized energy use, enhanced comfort, and improved security.'
                    ],
                    [
                        'title' => 'Maintenance and Lifecycle Management',
                        'desc' => 'Effective M&E systems include plans for regular maintenance and lifecycle management. This involves predictive maintenance strategies, monitoring system performance, and upgrading components as needed to extend the lifespan of the systems, reduce downtime, and ensure ongoing compliance with regulatory standards.'
                    ],
                    ]
                ],
                [
                    'slug' => 'micro-hydro-trainer-simulator',
                    'home_slug' => 'micro-hydro-trainer-simulator',
                    'title' => 'Micro Hydro Trainer Simulator',
                    'video' => '',
                    'image1' => 'img/product/trainer-remove.png',
                    'image2' => 'img/product/trainer-remove.png',
                    'description_points' => 
                    [
                    [
                        'title' => 'Purpose and Functionality',
                        'desc' => ' The Micro Hydro Trainer Simulator is designed to replicate the operation of a micro hydro power plant in a virtual environment. It aims to provide hands-on training and educational experiences for operators, engineers, and technicians, allowing them to understand and manage the dynamics of micro hydro systems without the need for physical equipment.'
                    ],
                    [
                        'title' => 'Realistic Simulation',
                        'desc' => ' The simulator models various components of a micro hydro power plant, including turbines, generators, intake systems, and control mechanisms. It simulates real-world scenarios such as flow variations, load changes, and mechanical failures to give users a comprehensive understanding of how different factors impact system performance.'
                    ],
                    [
                        'title' => 'Interactive Training Modules',
                        'desc' => 'The simulator includes interactive training modules that cover different aspects of micro hydro systems, such as system design, operation, maintenance, and troubleshooting. These modules often feature guided tutorials, quizzes, and hands-on exercises to enhance learning outcomes.'
                    ],
                    [
                        'title' => 'Customizable Scenarios',
                        'desc' => 'Users can customize simulation scenarios to reflect specific operational conditions, site characteristics, or technical challenges. This feature allows trainees to experience a wide range of situations and practice problem-solving skills in a controlled environment.'
                    ],
                    [
                        'title' => 'Real-Time Monitoring and Feedback',
                        'desc' => ' The simulator provides real-time monitoring of key parameters such as flow rates, pressure, power output, and efficiency. It offers instant feedback and visualizations, such as graphs and gauges, to help users analyze system performance and make informed decisions.'
                    ],
                    [
                        'title' => 'Data Logging and Analysis',
                        'desc' => 'It includes data logging capabilities to record simulation data for later analysis. Users can review historical data, generate reports, and evaluate performance metrics to understand system behavior over time and identify areas for improvement.'
                    ],
                    [
                        'title' => 'User-Friendly Interface',
                        'desc' => 'The simulator features an intuitive and user-friendly interface that simplifies navigation and operation. It typically includes drag-and-drop functionalities, interactive panels, and clear visual representations of system components, making it accessible to users with varying levels of experience.'
                    ],
                    [
                        'title' => 'Integration with Educational Programs',
                        'desc' => 'The Micro Hydro Trainer Simulator can be integrated into educational and training programs offered by universities, technical institutes, and training centers. It serves as a valuable tool for hands-on learning and helps bridge the gap between theoretical knowledge and practical application.'
                    ],
                    ]
                ]
                ];
            // Menyimpan data ke dalam database
            foreach ($detproduct as $productData) {
                $product = DetailProducts::create([
                    'title' => $productData['title'],
                    'slug' => $productData['slug'],
                    'home_slug' => $productData['home_slug'],
                    'video' => $productData['video'],
                    'image1' => $productData['image1'],
                    'image2' => $productData['image2'],
                ]);
            
                foreach ($productData['description_points'] as $point) {
                    DescriptionPoints::create([
                        'products_id' => $product->id,
                        'title' => $point['title'],
                        'desc' => $point['desc'],
                    ]);
                }
            }
            } else {
            // Tindakan alternatif jika picture tidak ditemukan
            $this->command->error('User dengan nama "PME Bandung" tidak ditemukan.');
        }
    }
}
   
