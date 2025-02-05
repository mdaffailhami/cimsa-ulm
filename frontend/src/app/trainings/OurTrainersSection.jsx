import { Container, Row } from 'react-bootstrap';
import TrainerCard from './TrainerCard';
import { css } from '@emotion/react';

export default function OurTrainersSection({ description, trainers }) {
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
            class='h2 mb-4 mt-2'
          >
            <b>Get to know our trainers</b>
          </h2>
          <p
            data-aos='fade-left'
            data-aos-duration='1200'
            data-aos-once='true'
            style={{ fontSize: '20px' }}
          >
            {description}
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
          {trainers.map((trainer) => (
            <TrainerCard
              thumbnail={trainer.image}
              title={trainer.name}
              description={trainer.description}
              url={trainer.url}
            />
          ))}
        </Row>
      </Container>
    </Container>
  );
}
