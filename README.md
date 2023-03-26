# Beech House Controller

This project is a simple smart home controller for my property Beech House. It is highly customised to my needs but may
contain some useful code for others, in particular the services that query and control the various devices. I have the
following aims:

 - Query power consumption and generation.
 - Optimise the home battery SoC to maximise the use of solar power and shift load to off-peak times.
 - Query and control the heating system to avoid heating empty rooms.
 - Query and control the alarm system to avoid false alarms and insure the system is armed appropriately.
 - Query and control the EV (Tesla Model 3) to optimise charging from peak power.


## Engineering

This project is limited in scope; I am not attempting to build a general purpose smart home controller. I hope to 
demonstrate some good practices, whilst also avoiding the temptation to over-engineer a solution by over generalising
and abstracting everything "so that it can be used for x or y in the future".
