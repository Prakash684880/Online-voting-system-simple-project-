<?php
$db = mysqli_connect("localhost", "root", "", "onlinevotingsystem") or die("Connectivity Failed");
?>

    <div class="col-8">
        <h3>Candidate Details</h3>
            
            
                <?php 
                    $fetchingData = mysqli_query($db, "SELECT * FROM candidate_details") or die(mysqli_error($db)); 
                    $isAnyCandidateAdded = mysqli_num_rows($fetchingData);

                    if($isAnyCandidateAdded > 0)
                    {
                        $sno = 1;
                        while($row = mysqli_fetch_assoc($fetchingData))
                        {
                            $election_id = $row['election_id'];
                            $fetchingElectionName = mysqli_query($db, "SELECT * FROM elections WHERE id = '". $election_id ."'") or die(mysqli_error($db));
                            $execFetchingElectionNameQuery = mysqli_fetch_assoc($fetchingElectionName);
                            $election_name = $execFetchingElectionNameQuery['election_topic'];

                            $candidate_photo = $row['candidate_photo'];

                ?>
                        <div class="col-4">
                                <?php echo $election_name; ?>
                                <div class="box-container>
                                <img src="<?php echo $candidate_photo; ?>" class="candidate_photo" /> 
                                <div class="box">
                                <?php echo $row['candidate_name']; ?>
                                </div> 
                                <?php echo $row['candidate_details']; ?>
                            </div>
                                
                        </div>
                                
                        <style>
                                 .col-4 {
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 20px;
                                    background-color: #f0f0f0;
                                    }

                                    .box-container {
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    margin-top: 20px;
                                    }

                                    .candidate_photo {
                                    width: 200px;
                                    height: 200px;
                                    object-fit: cover;
                                    border-radius: 50%;
                                    }

                                    .box {
                                    background-color: #ffffff;
                                    padding: 10px;
                                    margin-top: 10px;
                                    text-align: center;
                                    }

                        </style>
                                                       
                <?php
                        }
                    }else {
            ?>
                    
                            <?php echo " No any candidate is added yet."?>
                        
            <?php
                    }
                ?>
          
    </div>



