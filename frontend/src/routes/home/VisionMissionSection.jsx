import { Card, Col, Container, Row } from 'react-bootstrap';
import { css } from '@emotion/react';

export default function VisionMissionSection() {
  return (
    <Container className='d-flex flex-wrap justify-content-center'>
      <Row xs={1} sm={2}>
        <Col className='d-flex justify-content-center'>
          <ImageCard image='https://picsum.photos/200/300' aos='flip-right' />
        </Col>
        <Col className='d-flex align-items-center justify-content-center'>
          <TextCard
            title='Our Vision'
            body='lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            aos='fade-left'
          />
        </Col>
      </Row>
      <Row xs={1} sm={2} className='mt-4'>
        <Col className='d-flex align-items-center justify-content-center'>
          <TextCard
            title='Our Mission'
            body='lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            aos='fade-right'
          />
        </Col>
        <Col className='d-flex justify-content-center'>
          <ImageCard image='https://picsum.photos/200/301' aos='flip-left' />
        </Col>
      </Row>
    </Container>
  );
}

function ImageCard({ image, aos }) {
  return (
    <Card
      // className='shadow'
      data-aos={aos}
      data-aos-once='true'
      data-aos-duration='1200'
      css={css`
        background-image: url('${image}');
        background-position: center;
        background-size: cover;

        width: 340px;
        height: 220px;

        @media (min-width: 992px) {
          width: 500px;
          height: 280px;
        }
      `}
    />
  );
}

function TextCard({ title, body, aos }) {
  return (
    <Card
      className='shadow text-center'
      data-aos={aos}
      data-aos-once='true'
      data-aos-duration='1200'
      css={css`
        width: 340px;

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
