<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Competency Profile Details</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            font-size: 11px; /* Reduced font size */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 8px;
        }
        .header, .section-title {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h1, .section-title h2 {
            margin: 0;
            color:  #000035;
            font-size: 10px; /* Reduced font size */
        }
        .profile-section, .assessment-section {
            margin-bottom: 10px;
        }
        .profile-details, .qualification-list {
            margin-bottom: 5px;
        }
        .profile-details p, .qualification-item, .assessment-item {
            margin: 0;
            padding: 4px;


        }
        .profile-details strong, .qualification-item h3 {
            color:  #000035;
            font-size: 9px; /* Reduced font size */
        }
        .qualification-icon, .rating-icon {
            width: 0.5rem; /* Reduced icon size */
            height: 0.5rem; /* Reduced icon size */
            vertical-align: middle;
            margin-left: 5px;
        }
        .assessment-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid  #000035; /* Added border to table */
        }
        .assessment-table th, .assessment-table td {
            padding: 4px;
            text-align: left;
            font-size: 8px; /* Reduced font size */
            border: 1px solid  #000035; /* Added border to table */


        }
        .assessment-table th {
            background-color:  #000035;
            color: #ffffff;
        }
        .category-header {
            background-color:  #000035;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
        }
        .even-row {
            background-color: #f9fafb;
        }

        .chart{
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
         }
         .text-danger{
            color: #dc3545;
         }
         .text-success{
            color: #28a745;
         }
         .profile-details-table td{
            border-collapse: collapse;

            border: 1px solid  #000035; /* Added border to table */

        }
        .intervention{
            background-color: red;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Employee Competency Profile Details</h1>
        </div>

        <div class="profile-section">
            <div class="profile-details">
                <table class="profile-details-table" style="page-break-after: always;">
                    <tr>
                    <td>
                        <p><strong>Employee Name:</strong></p>
                    </td>
                    <td> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                    </tr>
                    <tr>
                        <td><p><strong>Job Title:</strong></p>
                        </td>
                        <td><?php echo e($jcp->position_title); ?></td>
                    </tr>
                    <tr>
                        <td><p><strong>Job Purpose:</strong></p></td>
                        <td><?php echo e($jcp->job_purpose); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Job Grade:</strong></p>
                        </td>
                        <td><?php echo e($jcp->job_grade); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Business Division</strong></p>
                        </td>
                        <td><?php echo e($user->deparment->division->division_name); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Department</strong></p>
                        </td>
                        <td><?php echo e($user->deparment->department_name); ?></td>
                    </tr>
                </table>



            </div>
            <div class="chart">
                <h2 class="section-title">My Skill Gap Chart</h2>

                    <img src="https://quickchart.io/chart?width=500&height=300&c=<?php echo e($chartUrl); ?>"/>
            </div>


            <div class="qualification-list">
                <h2 class="section-title">Required Qualifications</h2>
                <?php $__currentLoopData = $qualificationsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualificationData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="qualification-item">
                        <h3><?php echo e($qualificationData['name']); ?>

                            <?php if($qualificationData['attained']): ?>
                                <span class="text-success"> (Attained)</span>
                            <?php else: ?>
                                <span class="text-danger"> (Not Attained)</span>
                            <?php endif; ?>
                        </h3>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="assessment-section">
            <h2 class="section-title"><?php echo e($user->first_name); ?>'s Assessment</h2>
            <table class="assessment-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Skill</th>
                        <th>Required Rating</th>
                        <th>User Rating</th>
                        <th>Supervisor Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $jcp->skills->groupBy('category.category_title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="category-header">
                            <td colspan="5"><?php echo e($category); ?></td>
                        </tr>
                        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($index % 2 === 0 ? 'even-row' : ''); ?>">
                                    <?php if($jcp->skills->find($question->id)->pivot->required_level > $jcp->skills->find($question->id)->pivot->supervisor_rating): ?>
                                    <td style="background-color: #A4031F; color: white;"></td>
                                    <?php else: ?>
                                    <td></td>
                                    <?php endif; ?>

                                <td><?php echo e($question->skill_title); ?></td>
                                <td>
                                    <?php if($jcp->skills->find($question->id)->pivot->required_level === 1): ?>
                                        Not Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 2): ?>
                                        Basic Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 3): ?>
                                        Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 4): ?>
                                        Developed Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 5): ?>
                                        Expert
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($jcp->skills->find($question->id)->pivot->user_rating === 1): ?>
                                        Not Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 2): ?>
                                        Basic Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 3): ?>
                                        Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 4): ?>
                                        Developed Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 5): ?>
                                        Expert
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($jcp->skills->find($question->id)->pivot->supervisor_rating === 1): ?>
                                        Not Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 2): ?>
                                        Basic Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 3): ?>
                                        Competent
                                    <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 4): ?>
                                        Developed Skills
                                    <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 5): ?>
                                        Expert
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">No questions were added to this assessment.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/assessments/downloads/supervisor_results.blade.php ENDPATH**/ ?>