import { css } from '@emotion/react';
import PrimaryButton from '../PrimaryButton';
import { Container } from 'react-bootstrap';

export default function MainSection({ programs, trainings }) {
  return (
    <section
      css={css`
        padding-top: 10px;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: min-content 0 1fr 1fr 0 min-content;

        @media (min-width: 992px) {
          grid-template-columns: 1fr 0.1fr 1fr;
          grid-template-rows: 1fr 1fr;
        }
      `}
    >
      <div
        css={css`
          position: relative;
          background-image: url('https://picsum.photos/200');
          background-size: cover;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: 300px;

          @media (min-width: 992px) {
            height: 500px;
          }
        `}
      >
        <div
          css={css`
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
          `}
        />
        <h1
          css={css`
            position: absolute;
            color: white;
            font-weight: bold;
            top: 45%;
            left: 50%;
            transform: translateX(-50%);

            @media (min-width: 992px) {
              left: 20%;
              transform: none;
            }
          `}
        >
          Programs
        </h1>
      </div>
      <div />
      <Container
        css={css`
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;
          margin-top: 20px;

          @media (min-width: 992px) {
            margin-top: 0px;
          }
        `}
      >
        <h1
          data-aos='zoom-out'
          data-aos-once='true'
          data-aos-duration='1200'
          style={{ color: 'red' }}
        >
          <b>Our Programs</b>
        </h1>
        <p
          data-aos='fade-left'
          data-aos-once='true'
          data-aos-duration='1200'
          css={css`
            @media (min-width: 992px) {
              padding-right: 10%;
            }
          `}
        >
          {programs}
        </p>
        <PrimaryButton to='/activities/programs' isLarge={true}>
          Learn More
        </PrimaryButton>
      </Container>
      <Container
        css={css`
          text-align: right;
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;

          margin-top: 40px;
          margin-bottom: 30px;

          @media (min-width: 992px) {
            margin-bottom: 0px;
            margin-top: 0px;
          }
        `}
      >
        <h1
          data-aos='zoom-out'
          data-aos-once='true'
          data-aos-duration='1200'
          style={{ color: 'red' }}
        >
          <b>Our Trainings</b>
        </h1>
        <p
          data-aos='fade-right'
          data-aos-once='true'
          data-aos-duration='1200'
          css={css`
            @media (min-width: 992px) {
              padding-left: 10%;
            }
          `}
        >
          {trainings}
        </p>
        <PrimaryButton to='/activities/trainings' isLarge={true}>
          Learn More
        </PrimaryButton>
      </Container>
      <div />
      <div
        css={css`
          position: relative;
          background-image: url('https://picsum.photos/200');
          background-size: cover;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: 300px;

          @media (min-width: 992px) {
            height: 500px;
          }
        `}
      >
        <div
          css={css`
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
          `}
        />
        <h1
          css={css`
            position: absolute;
            color: white;
            font-weight: bold;
            top: 45%;
            left: 50%;
            transform: translateX(-50%);

            @media (min-width: 992px) {
              right: 20%;
              transform: none;
            }
          `}
        >
          Trainings
        </h1>
      </div>
    </section>
  );
}
