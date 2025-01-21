<?php
// Configuration arrays for different radar types and ranges
$radarTypes = [
    'sri' => [
        'title' => 'SRI (Surface Rainfall Intensity)',
        'description' => 'An estimate of rainfall intensity associated with different echoes.',
    ],
    'ppi' => [
        'title' => 'PPI (Plan Position Indicator)',
        'description' => 'A representation of the cloud echoes in a horizontal plane.',
    ],
    'max' => [
        'title' => 'MAX (Maximum)',
        'description' => 'Shows a 2 dimensional (2D) flow for the horizontal and vertical profile of the clouds.',
    ],
    'eht' => [
        'title' => 'EHT (Echo Height Top)',
        'description' => 'Gives a representation of the height to which the top of the clouds extend.',
    ],
    'hwind' => [
        'title' => 'HWIND (Horizontal Wind)',
        'description' => 'Shows wind flow at a specific altitude.',
    ],
    'vvp' => [
        'title' => 'VVP (Velocity Volume Processing)',
        'description' => 'Provides an estimate of the wind profile up to a certain height.',
    ]
];

$ranges = ['150km', '250km', '400km'];
$currentRange = isset($_GET['range']) ? $_GET['range'] : '150km';
$currentType = isset($_GET['type']) ? $_GET['type'] : 'sri';

$radarNavConfig = [
    'ranges' => [
        '150km' => [
            'title' => '150km Range',
            'url' => '/observations/radar-imagery/150km',
            'children' => [
                'sri' => [
                    'title' => 'Surface Rainfall Intensity',
                    'url' => '/observations/radar-imagery/150km/sri-surface-rainfall-intensity'
                ],
                'ppi' => [
                    'title' => 'Plan Position Indicator',
                    'url' => '/observations/radar-imagery/150km/ppi-plan-position-indicator'
                ],
                'max' => [
                    'title' => 'Maximum',
                    'url' => '/observations/radar-imagery/150km/max-maximum'
                ],
                'eht' => [
                    'title' => 'Echo Height Top',
                    'url' => '/observations/radar-imagery/150km/eht-echo-height-top'
                ],
                'hwind' => [
                    'title' => 'Horizontal Wind',
                    'url' => '/observations/radar-imagery/150km/hwind-horizontal-wind'
                ],
                'vvp' => [
                    'title' => 'Velocity Volume Processing',
                    'url' => '/observations/radar-imagery/150km/vvp-velocity-volume-processing'
                ]
            ]
        ],
        '250km' => [
            'title' => '250km Range',
            'url' => '/observations/radar-imagery/250km',
            'children' => [
                'sri' => [
                    'title' => 'Surface Rainfall Intensity',
                    'url' => '/observations/radar-imagery/250km/sri-surface-rainfall-intensity'
                ],
                'ppi' => [
                    'title' => 'Plan Position Indicator',
                    'url' => '/observations/radar-imagery/250km/ppi-plan-position-indicator'
                ],
                'max' => [
                    'title' => 'Maximum',
                    'url' => '/observations/radar-imagery/250km/max-maximum'
                ],
                'eht' => [
                    'title' => 'Echo Height Top',
                    'url' => '/observations/radar-imagery/250km/eht-echo-height-top'
                ],
                'hwind' => [
                    'title' => 'Horizontal Wind',
                    'url' => '/observations/radar-imagery/250km/hwind-horizontal-wind'
                ],
                'vvp' => [
                    'title' => 'Velocity Volume Processing',
                    'url' => '/observations/radar-imagery/250km/vvp-velocity-volume-processing'
                ]
            ]
        ],
        '400km' => [
            'title' => '400km Range',
            'url' => '/observations/radar-imagery/400km',
            'children' => [
                'sri' => [
                    'title' => 'Surface Rainfall Intensity',
                    'url' => '/observations/radar-imagery/400km/sri-surface-rainfall-intensity'
                ],
                'ppi' => [
                    'title' => 'Plan Position Indicator',
                    'url' => '/observations/radar-imagery/400km/ppi-plan-position-indicator'
                ],
                'max' => [
                    'title' => 'Maximum',
                    'url' => '/observations/radar-imagery/400km/max-maximum'
                ],
                'eht' => [
                    'title' => 'Echo Height Top',
                    'url' => '/observations/radar-imagery/400km/eht-echo-height-top'
                ],
                'hwind' => [
                    'title' => 'Horizontal Wind',
                    'url' => '/observations/radar-imagery/400km/hwind-horizontal-wind'
                ],
                'vvp' => [
                    'title' => 'Velocity Volume Processing',
                    'url' => '/observations/radar-imagery/400km/vvp-velocity-volume-processing'
                ]
            ]
        ]
    ]
];

// Get current URL path
$currentPath = $_SERVER['REQUEST_URI'];
?>

<!-- Maintenance Message Section -->
<?php if (isset($maintenance_mode) && $maintenance_mode): ?>
<div>
    <p><font color="red">Due to maintenance work on the TTMS Radar system, there would be NO updated Radar Imagery until further notice. We do apologize for any inconvenience caused but this work is necessary to maintain a regular supply of radar products.</font></p>
</div>
<?php endif; ?>

<section class="section section-lg bg-gray-light novi-background bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rd-navbar-wrap">
                    <nav class="rd-navbar rd-navbar-classic rd-navbar-original rd-navbar-static">
                        <div class="rd-navbar-main-outer">
                            <div class="rd-navbar-main">
                                <div class="rd-navbar-nav-wrap">
                                    <ul class="rd-navbar-nav">
                                        <?php foreach ($radarNavConfig['ranges'] as $range => $rangeData): ?>
                                        <li class="rd-nav-item <?= strpos($currentPath, $rangeData['url']) === 0 ? 'active' : '' ?>">
                                            <a class="rd-nav-link" href="<?= $rangeData['url'] ?>"><?= $rangeData['title'] ?></a>
                                            <?php if (isset($rangeData['children'])): ?>
                                            <ul class="rd-menu rd-navbar-dropdown">
                                                <?php foreach ($rangeData['children'] as $type => $typeData): ?>
                                                <li class="rd-dropdown-item <?= $currentPath === $typeData['url'] ? 'active' : '' ?>">
                                                    <a class="rd-dropdown-link" href="<?= $typeData['url'] ?>"><?= $typeData['title'] ?></a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <style>
                .rd-navbar-classic .rd-navbar-nav > li > .rd-navbar-dropdown {
                    margin-top: 0;
                }

                .rd-navbar-dropdown .active > .rd-dropdown-link {
                    color: #3c6a36;
                }
                </style>

                <!-- Range Navigation Tabs -->
                <ul class="nav nav-tabs">
                    <?php foreach ($ranges as $range): ?>
                    <li class="<?= $currentRange === $range ? 'active' : '' ?>">
                        <a href="#<?= $range ?>" data-range="<?= $range ?>"><?= $range ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Tab Content -->
                <div class="panorama">
                    <div class="tab-content" id="radarContent">
                        <div class="row" id="radarImages">
                            <!-- Content will be loaded here via AJAX -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentPlayer = null;
    
    // Function to load radar images
    function loadRadarImages(range) {
        const container = document.getElementById('radarImages');
        container.innerHTML = ''; // Clear existing content
        
        Object.entries(<?= json_encode($radarTypes) ?>).forEach(([type, config]) => {
            const div = document.createElement('div');
            div.className = 'col-md-4';
            div.innerHTML = `
                <div class="card mb-3">
                    <div class="radar-sequence" id="sequence_${type}_${range}">
                        ${Array.from({length: 15}, (_, i) => i + 1)
                            .map(i => `<img class="img-fluid mySlides card-img-top" 
                                           src="https://www.metoffice.gov.tt/media/radar/${range}/${type}/${type}${i}.png" 
                                           style="display: ${i === 1 ? 'block' : 'none'};">`)
                            .join('')}
                    </div>
                    <div class="sequence-controls">
                        <button class="btn btn-primary" onclick="players['${type}_${range}'].first()">⏮</button>
                        <button class="btn btn-primary" onclick="players['${type}_${range}'].prev()">⏪</button>
                        <button class="btn btn-primary" onclick="players['${type}_${range}'].togglePlay()" id="playPauseBtn_${type}_${range}">⏸</button>
                        <button class="btn btn-primary" onclick="players['${type}_${range}'].next()">⏩</button>
                        <button class="btn btn-primary" onclick="players['${type}_${range}'].last()">⏭</button>
                    </div>
                    <div class="card-body">
                        <h4>${config.title}</h4>
                        <p>${config.description}</p>
                        <a class="btn btn-info" 
                           href="https://metoffice.gov.tt/${range}${type}" 
                           target="_blank" 
                           rel="noopener">Open Fullscreen</a>
                    </div>
                </div>
            `;
            container.appendChild(div);
            
            // Initialize player for this sequence
            if (!window.players) window.players = {};
            window.players[`${type}_${range}`] = new SequencePlayer({
                container: document.getElementById(`sequence_${type}_${range}`),
                autoplay: true,
                playSpeed: 800,
                loop: true,
                playPauseBtn: document.getElementById(`playPauseBtn_${type}_${range}`)
            });
        });
    }

    // Add click handlers to tabs
    document.querySelectorAll('.nav-tabs a').forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Remove active class from all tabs
            document.querySelectorAll('.nav-tabs li').forEach(li => li.classList.remove('active'));
            e.target.parentElement.classList.add('active');
            
            // Load content for selected range
            const range = e.target.dataset.range;
            loadRadarImages(range);
        });
    });

    // Load initial content
    loadRadarImages('<?= $currentRange ?>');
});
</script>
