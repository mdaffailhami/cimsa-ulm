import { Container, Row } from 'react-bootstrap';
import TrainerCard from './TrainerCard';
import { css } from '@emotion/react';

export default function OurTrainersSection() {
  return (
    <Container fluid style={{ background: 'red', padding: '14px 0 8px 0' }}>
      <Container>
        <Container
          css={css`
            color: white;
            text-align: center;
            max-width: 900px;
          `}
        >
          <h2
            data-aos='fade-right'
            data-aos-duration='1200'
            data-aos-once='true'
          >
            <b>Get to know our trainers</b>
          </h2>
          <p
            data-aos='fade-left'
            data-aos-duration='1200'
            data-aos-once='true'
            style={{ fontSize: '20px' }}
          >
            CIMSA has an established capacity building system where members may
            become trainers that will act as peer educators on various topics.
            These ‘trainings of trainers’ are conducted each year (some are held
            biennially), ensuring a steady production of trainers and a
            continuous stream of capacity buildings.
          </p>
        </Container>
        <Row
          xs={1}
          sm={1}
          md={2}
          lg={2}
          xl={3}
          css={css`
            justify-content: center;
          `}
        >
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2020/05/2020-05-31-03.53.39-5.jpg`}
            title={'Cimsa Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2022/02/DSC07531-2048x1149.png`}
            title={'Medical Education Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2020/05/2020-05-31-03.53.39-5.jpg`}
            title={'Peer Education Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2022/02/DSC07531-2048x1149.png`}
            title={'Cimsa Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2020/05/2020-05-31-03.53.39-5.jpg`}
            title={'Medical Education Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
          <TrainerCard
            thumbnail={`https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2022/02/DSC07531-2048x1149.png`}
            title={'Peer Education Trainers'}
            description={
              'CIMSA Trainers, or also commonly called backbones, gives trainings on the topic of CIMSA itself and skills related to organizational management, communication, and leadership. CIMSA Trainers are trained in ‘TNTs’ or Training New Trainers which are held both regionally and nationally.'
            }
          />
        </Row>
      </Container>
    </Container>
  );
}
