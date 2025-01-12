import { Card, Col, Container, Row } from 'react-bootstrap';
import { css } from '@emotion/react';
import { useEffect, useReducer } from 'react';

export default function VisionMissionSection() {
  const [update, forceUpdate] = useReducer((x) => x + 1, 0);

  useEffect(() => {
    const onResize = () => forceUpdate();

    window.addEventListener('resize', onResize);

    return () => {
      window.removeEventListener('resize', onResize);
    };
  }, []);

  // Make Vision & Mission Images height to be based on the Vision & Mission Text Height
  useEffect(() => {
    const visionText = document.getElementById('vision-text');
    const visionImage = document.getElementById('vision-image');
    const missionText = document.getElementById('mission-text');
    const missionImage = document.getElementById('mission-image');

    const visionHeight = visionText.clientHeight;
    const missionHeight = missionText.clientHeight;

    visionImage.style.height = `${visionHeight}px`;
    missionImage.style.height = `${missionHeight}px`;
  }, [update]);

  return (
    <Container className='d-flex flex-wrap justify-content-center'>
      <Row xs={1} sm={1} md={2}>
        <Col className='d-flex justify-content-center'>
          <ImageCard
            id='vision-image'
            image='https://picsum.photos/200/300'
            aos='flip-right'
          />
        </Col>
        <Col className='d-flex align-items-center justify-content-center'>
          <TextCard
            id='vision-text'
            title='Our Vision'
            body='lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            aos='fade-left'
          />
        </Col>
      </Row>
      <Row xs={1} sm={1} md={2} className='mt-4'>
        <Col className='d-flex align-items-center justify-content-center'>
          <TextCard
            id='mission-text'
            title='Our Mission'
            body='lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            aos='fade-right'
          />
        </Col>
        <Col className='d-flex justify-content-center'>
          <ImageCard
            id='mission-image'
            image='https://picsum.photos/200/301'
            aos='flip-left'
          />
        </Col>
      </Row>
    </Container>
  );
}

function ImageCard({ id, image, aos }) {
  return (
    <Card
      id={id}
      data-aos={aos}
      data-aos-once='true'
      data-aos-duration='1200'
      css={css`
        background-image: url('${image}');
        background-position: center;
        background-size: cover;

        width: 100%;
        height: 220px;

        @media (min-width: 992px) {
          width: 500px;
          height: 280px;
        }
      `}
    />
  );
}

function TextCard({ id, title, body, aos }) {
  return (
    <Card
      id={id}
      className='shadow text-center'
      data-aos={aos}
      data-aos-once='true'
      data-aos-duration='1200'
      css={css`
        width: 100%;

        @media (min-width: 992px) {
          width: 500px;
        }
      `}
    >
      <Card.Body>
        <Card.Title
          css={css`
            color: red;
            font-weight: bold;
            font-size: 23px;

            @media (min-width: 992px) {
              font-size: 26px;
            }
          `}
        >
          {title}
        </Card.Title>
        <Card.Text
          css={css`
            @media (min-width: 992px) {
              font-size: 18px;
            }
          `}
        >
          {body}
        </Card.Text>
      </Card.Body>
    </Card>
  );
}
