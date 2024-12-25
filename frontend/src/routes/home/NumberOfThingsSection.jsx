import { css } from '@emotion/react';
import { Card, Col, Container, Row } from 'react-bootstrap';
import CountUp from 'react-countup';

export default function NumberOfThingsSection() {
  return (
    <Container
      className='d-flex flex-wrap justify-content-center'
      data-aos='zoom-in'
      data-aos-duration='1200'
      data-aos-once='true'
    >
      <Row xs={2} sm={2} md={4} lg={4} className='g-5'>
        <Col>
          <NumberOfThing prefix='' number={2001} title='Established Year' />
        </Col>
        <Col>
          <NumberOfThing prefix='+' number={500} title='Active Members' />
        </Col>
        <Col>
          <NumberOfThing prefix='+' number={120} title='Successful Projects' />
        </Col>
        <Col>
          <NumberOfThing prefix='' number={5} title='Community Development' />
        </Col>
      </Row>
    </Container>
  );
}

function NumberOfThing({ prefix, number, title }) {
  return (
    <Card style={{ border: 'none' }}>
      <Card.Body>
        <Card.Title as='h1' className='text-center'>
          <CountUp
            enableScrollSpy={true} // Start the animation on scroll
            scrollSpyOnce={true}
            start={0}
            end={number}
            duration={4}
            separator=''
            decimals={0}
            decimal=','
            suffix=''
            prefix={prefix}
          >
            {({ countUpRef }) => (
              <span
                ref={countUpRef}
                css={css`
                  font-weight: 600;
                  color: #2d2d2d;
                  font-size: 36px;

                  @media (min-width: 992px) {
                    font-size: 50px;
                  }
                `}
              />
            )}
          </CountUp>
        </Card.Title>
        <Card.Subtitle className='text-center'>{title}</Card.Subtitle>
      </Card.Body>
    </Card>
  );
}
