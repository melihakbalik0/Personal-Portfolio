<?php

/**
 * Veritabanı boş veya bağlantı yoksa ana sayfada yine de projeler görünsün diye kullanılır.
 */
function get_default_projects(): array
{
    $now = date('Y-m-d H:i:s');

    return [
        [
            'id' => 1,
            'title' => 'Heart Disease Prediction ML',
            'description' => 'End-to-end Machine Learning project to predict heart disease using the CDC dataset with Logistic Regression and Random Forest algorithms.',
            'tech_stack' => 'Python, Jupyter Notebook, scikit-learn, ML',
            'category' => 'Machine Learning',
            'github_url' => 'https://github.com/melihakbalik0/Heart-Disease-Prediction-ML',
            'image_url' => 'assets/img/project1.jpg',
            'created_at' => $now,
        ],
        [
            'id' => 2,
            'title' => 'Olist E-commerce Data Analysis',
            'description' => 'Complete SQL-based data engineering and analytics workflow using the Olist Brazilian E-commerce dataset.',
            'tech_stack' => 'MySQL, SQL, Data Engineering, BI',
            'category' => 'Data Science',
            'github_url' => 'https://github.com/melihakbalik0/Olist-Ecom-Data-Analysis',
            'image_url' => 'assets/img/project2.jpg',
            'created_at' => $now,
        ],
    ];
}
